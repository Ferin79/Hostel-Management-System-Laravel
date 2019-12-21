<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
            $user = User::findOrFail(auth()->user()->id);
            return view('Profile.index',compact('user'));
    }
}
