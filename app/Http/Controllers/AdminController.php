<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register()
    {
        if(auth()->user())
        {
            return redirect('/home');
        }
        else
        {
            return view('Profile.Admin.register');
        }
    }
    public function pending(User $user)
    {
        $data = $user->all();
        return view('Profile.Admin.pending',compact('data'));
    }
    public function accept($user)
    {
        $data = User::find($user);
        $data->pending = '0';
        $data->save();
        return redirect('/admin/pending');
    }
    public function reject($user)
    {
        User::find($user)->delete();
    }
}
