<?php

namespace App\Http\Controllers\User;

use App\Models\Car;
use App\Models\User;
use App\Models\Order;
use App\Models\CarLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function pay($car_id) 
    {
        // Get car from DB
        $car = Car::findOrFail($car_id);
        $amount_cents = $car->price * 100;

        // Store session for callback
        session([
            'car_id' => $car->id,
            'price' => $car->price,
            'name' => $car->name,
            'payment_method' => 'card',
            'user_id' => auth()->id(),
        ]);

        // 1️⃣ Auth
        $auth = Http::post('https://accept.paymob.com/api/auth/tokens', [
            'api_key' => env('PAYMOB_API_KEY')
        ])->json();

        $auth_token = $auth['token'];

        // 2️⃣ Create Order
        $order = Http::post('https://accept.paymob.com/api/ecommerce/orders', [
            "auth_token" => $auth_token,
            "delivery_needed" => false,
            "amount_cents" => $amount_cents,
            "currency" => "EGP",
            "items" => [
                [
                    "name" => $car->name,
                    "amount_cents" => $amount_cents,
                    "description" => "Car purchase",
                    "quantity" => 1
                ]
            ]
        ])->json();

        $order_id = $order['id'];

        // 3️⃣ Payment Key
        $payment_key = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', [
            "auth_token" => $auth_token,
            "amount_cents" => $amount_cents,
            "expiration" => 3600,
            "order_id" => $order_id,
            "billing_data" => [
                "first_name" => "Car",
                "last_name" => "Buyer",
                "email" => "test@test.com",
                "phone_number" => "01000000000",
                "country" => "EG",
                "city" => "Cairo",
                "street" => "123",
                "building" => "1",
                "floor" => "1",
                "apartment" => "1"
            ],
            "currency" => "EGP",
            "integration_id" => env('PAYMOB_INTEGRATION_ID')
        ])->json()['token'];

        return redirect("https://accept.paymob.com/api/acceptance/iframes/" .
            env('PAYMOB_IFRAME_ID') .
            "?payment_token=" . $payment_key);
    }

    // 🚀 CALLBACK
    public function callback(Request $request)
    {
        // Use query parameters
        $data = $request->query();

        // 0️⃣ HMAC CHECK
        if (!$this->isValidHmac($data)) {
            return "Invalid callback (HMAC failed)";
        }

        // 1️⃣ Check success
        if (!isset($data['success']) || $data['success'] !== 'true') {
            $car_id = session('car_id');
            $car = Car::find($car_id);
            $car_brand = $car->brand;
            return view('User.failedPaymob', compact('car_brand'));
        }

        // 2️⃣ Extract session data
        $car_id = session('car_id');
        $price = session('price');
        $name = session('name');
        $payment_method = session('payment_method');
        $user_id = session('user_id');
        $user = User::find($user_id); 

        // 3️⃣ Create Order
        Order::create([
            'price' => $price,
            'location' => $user->address,
            'payment_method' => $payment_method,
            'user_id' => $user_id,
            'car_id' => $car_id,
        ]);

        // 4️⃣ Car log
        $user = User::find($user_id);
        $car = Car::find($car_id);
        $brand = $car->brand;
        CarLog::create([
            'car_name' => $brand . ' ' . $name,
            'user_name' => $user->name,
            'action' => 'sold',
            'details' => 'Car ' . $brand . ' ' . $name . ' bought by ' . $user->name,
        ]);

        // 5️⃣ Update car
        $car = Car::find($car_id); 
        $car->update([
            'buy' => $car->buy + 1,
            'n_of_pieces' => $car->n_of_pieces - 1,
        ]);
        $car_brand = $car->brand;
        // 6️⃣ Clear session
        session()->forget([
            'car_id', 'price', 'name', 'payment_method', 'user_id'
        ]);

        return view('User.successPaymob', compact('car_brand'));
    }

    // 🛡 HMAC VALIDATION
    private function isValidHmac($data)
    {
        if (!isset($data['hmac'])) return false;

        $hmac_sent = $data['hmac'];

        // Convert dotted keys to underscore
        $flat = [];
        foreach ($data as $key => $value) {
            $key = str_replace('.', '_', $key);
            $flat[$key] = $value;
        }

        // Paymob required keys order
        $keys = [
            "amount_cents",
            "created_at",
            "currency",
            "error_occured",
            "has_parent_transaction",
            "id",
            "integration_id",
            "is_3d_secure",
            "is_auth",
            "is_capture",
            "is_refunded",
            "is_standalone_payment",
            "is_voided",
            "order",
            "owner",
            "pending",
            "source_data_pan",
            "source_data_sub_type",
            "source_data_type",
            "success"
        ];

        $concat = "";
        foreach ($keys as $key) {
            $concat .= $flat[$key] ?? "";
        }

        $calculated = hash_hmac('sha512', $concat, env('PAYMOB_HMAC'));

        return hash_equals($calculated, $hmac_sent);
    }
}
