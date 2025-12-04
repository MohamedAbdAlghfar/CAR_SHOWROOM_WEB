<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\CarLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateCarController extends Controller
{
    public function create()
    {
        return view('Admin.createCar');     
    }

    public function store(Request $request)
    {
        
        $rules = [ 
            'name' => 'required|string|max:255',
            'brand' => 'required', 
            'n_of_pieces' => 'required',
            'fuel_type' => 'required',
            'price' => 'required',
            'year' => 'required',
            'country' => 'required', 
            'color' => 'required',
            'image' => 'required', 

        ];

        $this->validate($request, $rules); 

        if($file = $request->file('image')) {

            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

            if($file->move('images', $file_to_store)) {
                    $photo = $file_to_store ;
            }
        }
        $car = Car::create($request->merge(["buy" => 0,"filename" => $photo])->all());
            CarLog::create([
        'car_name' => $car->brand . ' ' . $car->name, 
        'user_name' => Auth::user()->name,
        'action' => 'created',
        'details' => 'Car created with name: ' . $car->brand . ' ' . $car->name,
    ]);
        return redirect('admin/dashboard')->withStatus('Car successfully created.');     

        }







}
