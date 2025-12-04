<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EditUserController extends Controller
{
    public function index()  
    {
        $users = User::select('id', 'name', 'email', 'phone', 'gender')->where('role', 0)->orderBy('id', 'desc')->get();
        return view('Admin.EditUsers',compact('users'));   
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.EditUser', compact('user')); 
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

        return redirect()->route('editUsers.index')->withStatus(__('User successfully updated.'));
    }


}
