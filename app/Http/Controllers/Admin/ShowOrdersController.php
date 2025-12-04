<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ShowOrdersController extends Controller
{
    public function show()
{
    $orders = Order::with(['user', 'car'])
    ->orderBy('id', 'desc')
    ->get();

    return view('Admin.showOrders', compact('orders'));

}










}
