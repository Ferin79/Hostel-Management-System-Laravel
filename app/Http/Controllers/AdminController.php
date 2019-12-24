<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function adminHome()
    {
        return view('Profile.Admin.home');
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
        return redirect('/admin/pending');
    }

    public function block($user)
    {
        $data = User::find($user);
        $data->pending = '1';
        $data->save();
        return redirect('/admin/manage-admin');
    }

    public function manageAdmin()
    {
        $data = User::all();
        return view('Profile.Admin.manageAdmin',compact('data'));
    }

    public function manageStudent()
    {
        $data = User::all();
        return view('Profile.Admin.manageStudent',compact('data'));
    }
}
