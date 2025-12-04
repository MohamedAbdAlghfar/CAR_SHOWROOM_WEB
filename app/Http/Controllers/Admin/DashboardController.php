<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
         
        $user_count = User::where('role', 0)->count();
        $admin_count = User::where('role', 1)->count();
        $totalPrice_in_day = Order::whereDate('created_at', today())->sum('price');
        $totalPrice_in_month = Order::whereMonth('created_at', now()->month)
         ->whereYear('created_at', now()->year)
         ->sum('price');
        $total_order_price = Order::sum('price');

        $data = [
           'user_count' => $user_count,  
           'admin_count' => $admin_count,
           'totalPrice_in_day' => $totalPrice_in_day,
           'totalPrice_in_month' => $totalPrice_in_month,
           'total_order_price' => $total_order_price
                ];

        return view('Admin\dashboard',compact('data'));
    
     
    }






}
