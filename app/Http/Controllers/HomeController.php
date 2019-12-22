<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        if(auth()->user()->user_type == 'admin')
        {
            if(auth()->user()->pending == '0')
            {
                $data = $user->all();
                $user = auth()->user()->email;
                return view('Profile.Admin.dashboard',compact('data','user'));
            }
            else
            {
                return view('profile.Admin.requested');
            }
        }
        else
        {
            return view('Profile.Student.home');
        }
    }
}
