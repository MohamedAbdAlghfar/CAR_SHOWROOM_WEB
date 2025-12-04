<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DeleteUserController extends Controller 
{
    public function delete() 
    {
        $users = User::select('id', 'name', 'email', 'phone', 'gender')->where('role', 0)->orderBy('id', 'desc')->get();
        return view('Admin.deleteUser',compact('users'));   
    }

    public function destroy($id) 
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/dashboard')->withStatus('User successfully deleted.');
    }







}
