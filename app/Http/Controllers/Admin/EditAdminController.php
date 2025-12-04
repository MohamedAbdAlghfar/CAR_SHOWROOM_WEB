<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EditAdminController extends Controller
{
    public function index()  
    {
        $users = User::select('id', 'name', 'email', 'phone', 'gender')->where('role', 1)->orderBy('id', 'desc')->get();
        return view('Admin.EditAdmins',compact('users'));   
    } 

    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.EditAdmin', compact('user')); 
    }


    public function update(Request $request,$id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255', 
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required', 
            'job' => 'required',
        ];
    
        $this->validate($request, $rules);
    
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'), 
            'job' => $request->input('job'),
        ];
    
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }
        $user = User::find($id);    
        $user->update($data);

        return redirect()->route('editAdmins.index')->withStatus(__('Admin successfully updated.'));
    }

}
