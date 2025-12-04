<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateAdminController extends Controller
{
    public function create()
    {
        return view('Admin.createAdmin');   
    }

    public function store(Request $request)
    {
        
        $rules = [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255', 
            'password' => 'required|string|min:8',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'age' => 'required', 
            'job' => 'required',

        ];

        $this->validate($request, $rules); 

        if($request->gender == "male")
        $gender = 0 ;
      else
        $gender = 1 ;
  

        $user = User::create($request->merge(['password' => Hash::make($request->get('password')), "role" => 1,'gender' => $gender])->all());
        
           
        return redirect('admin/dashboard')->withStatus('Admin successfully created.');     

        }





}
