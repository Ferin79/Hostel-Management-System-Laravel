<?php

namespace App\Http\Controllers;

use App\RoomDetails;
use Illuminate\Http\Request;

class OpenController extends Controller
{
    //
    public function home()
    {
        return view('welcome');
    }
    public function adminHome()
    {
        return view('Profile.Admin.home');
    }
    public function register()
    {
        return view('Profile.Admin.register');
    }
    public function unauth()
    {
        return view('unauth');
    }
    public function showRooms()
    {
        $data = RoomDetails::all();
        return view('showRooms',compact('data'));
    }
}
