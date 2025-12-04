<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DeleteAdminController extends Controller
{
    public function delete() 
    {
        $users = User::select('id', 'name', 'email', 'phone', 'gender')->where('role', 1)->orderBy('id', 'desc')->get();
        return view('Admin.deleteAdmin',compact('users'));   
    }

    public function destroy($id) 
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/dashboard')->withStatus('Admin successfully deleted.');
    }
}
