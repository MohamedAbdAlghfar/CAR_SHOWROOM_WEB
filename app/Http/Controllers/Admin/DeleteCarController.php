<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\CarLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeleteCarController extends Controller
{
    public function delete()  
    {
        $cars = Car::select('id', 'name', 'brand', 'year', 'country','color','filename')->orderBy('id', 'desc')->get();
        return view('Admin.deleteCar',compact('cars'));    
    }

    public function destroy($id)  
    {
        $car = Car::find($id); 
      CarLog::create([
    'car_name' => $car->brand . ' ' . $car->name, 
    'action' => 'deleted',
    'details' => 'Car deleted',
    'user_name' => Auth::user()->name,  
]);

    if($car->filename){
        $filename = $car->filename;
        unlink('images/' . $filename);
        }   
        $car->delete();
        return redirect('admin/dashboard')->withStatus('Car successfully deleted.');
    }








}
