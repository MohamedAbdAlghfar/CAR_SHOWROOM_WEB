<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class viewCarsController extends Controller
{
    public function show($brand) 
    {
        $cars = Car::where('brand', $brand)->get();
        return view('User.viewCars',compact('cars'));
         
    }     











}
