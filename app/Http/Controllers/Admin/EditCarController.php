<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\CarLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditCarController extends Controller
{
    public function index()  
    {
        $cars = Car::select('id', 'name', 'brand', 'year', 'country','color','filename')->orderBy('id', 'desc')->get();
        return view('Admin.EditCars',compact('cars'));    
    }

    public function edit($id)
    {
        $car = Car::find($id);
        return view('Admin.EditCar', compact('car'));  
    } 

    public function update(Request $request,$id)
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
            'buy' => 'required',
            
        ];
    
        $this->validate($request, $rules);
    
        $data = [
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'n_of_pieces' => $request->input('n_of_pieces'),
            'fuel_type' => $request->input('fuel_type'),
            'price' => $request->input('price'), 
            'year' => $request->input('year'),
            'country' => $request->input('country'),
            'color' => $request->input('color'),
            'image' => $request->input('image'),
            'buy' => $request->input('buy'),
        ];
        
        $car = Car::find($id); 
        $oldData = $car->toArray();   
        $car->update($data);
        if ($file = $request->file('image')) { 
            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
        if ($file->move('images', $file_to_store)) {
            if ($car->filename) {
               
                  $photo = $car->filename;
    
                  // Remove the old image
                  $oldFilename = $photo; 
                  unlink('images/' . $oldFilename);
                
                $photo = $file_to_store;
            
                $car->filename = $photo;

            }
        }
    }
        $car->save();

$changesText = "";

foreach ($car->getChanges() as $field => $newValue) {

    // Skip fields you don’t want in the log
    if (in_array($field, ['updated_at', 'created_at', 'id'])) {
        continue;
    }

    if (isset($oldData[$field])) {
        $changesText .= ucfirst(str_replace('_', ' ', $field)) 
            . ": " . $oldData[$field] . " → " . $newValue 
            . " Updated\n";
    }
}

            CarLog::create([
        'car_name' => $car->brand . ' ' . $car->name,
        'user_name' => Auth::user()->name,
        'action' => 'updated',
        'details' => $changesText,
    ]);

        return redirect()->route('editCars.index')->withStatus(__('Car successfully updated.'));
    }







}
