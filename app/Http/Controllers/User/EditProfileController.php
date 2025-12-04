<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function edit(){ 
     $user = Auth::user();
     return view('User.EditProfile', compact('user'));  
    } 

    public function update(Request $request)
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
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->update($data);

        return redirect()->route('dashboard')->withStatus(__('User successfully updated.')); 
    }










}
