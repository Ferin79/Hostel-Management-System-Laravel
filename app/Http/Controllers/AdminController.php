<?php

namespace App\Http\Controllers;

use App\RoomDetails;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        $data = $user->all()->where('pending','1');
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
        $data = $data->where('user_type','admin');
        $data = $data->where('pending','0');
        return view('Profile.Admin.manageAdmin',compact('data'));
    }

    public function manageStudent()
    {
        $data = User::all()->where('user_type','user');
        return view('Profile.Admin.manageStudent',compact('data'));
    }

    public function showAddRoom()
    {
        return view('Profile.Admin.addRoom');
    }

    public function addRoom()
    {
        $data = request()->validate([
            'room_no' => 'required',
            'department' => 'required',
            'ac' => 'required',
            'bed_no' => 'required',
            'price' => 'required',
            'image1' => ['required','image'],
            'image2' => ['required','image'],
        ]);
        if(request('image1') && request('image2'))
        {
            $imagePath1 = request('image1')->store('uploads/Rooms','public');
            $image1 = Image::make(public_path("storage/{$imagePath1}"))->fit(1280,720);
            $image1->save();
            $imagePath2 = request('image2')->store('uploads/Rooms','public');
            $image2 = Image::make(public_path("storage/{$imagePath2}"))->fit(1280,720);
            $image2->save();
            $imageArray = [
                'image1' => $imagePath1,
                'image2' => $imagePath2
            ];
        }
        $new = new RoomDetails();
        $new->create(array_merge(
            $data,
            $imageArray,
            ['user_id' => auth()->user()->id]
        ));
        return redirect('/admin/add-room');
    }
}
