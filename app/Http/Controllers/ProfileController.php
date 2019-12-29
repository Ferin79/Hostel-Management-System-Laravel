<?php

namespace App\Http\Controllers;

use App\RoomDetails;
use App\StudentApply;
use App\StudentProfile;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
            $user = User::findOrFail(auth()->user()->id);
            return view('Profile.Student.index',compact('user'));
    }
    public function update(User $user)
    {
        $data = request()->validate([
            'gender' => 'required',
            'cast' => 'required',
            'lane1' => 'required',
            'lane2' => 'required',
            'lane3' => '',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'degree' => 'required',
            'marks' => 'required',
            'department' => 'required',
            'sem' => 'required',
            'image' => 'image',
        ]);
        if(request('image'))
        {
            $imagePath = request('image')->store('uploads/StudentProfile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(300,300);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->StudentProfile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect('/student/profile');
    }

    public function apply()
    {
        $user = auth()->user();
        $roomDetails = RoomDetails::all();
        $data = StudentApply::all();
        $data = $data->where('user_id',auth()->user()->id);
        if(count($data) > 0)
        {
            return view('bookAlready');
        }
        else
        {
            return view('Profile.Student.applyRoom',compact('user','roomDetails'));
        }
    }
    public function addApply()
    {
        $data = request()->validate([
            "guard_name" => 'required',
            "guard_email" => 'required',
            "guard_number" => 'required',
            "room_type" => 'required',
            "ac" => "required",
            "food" => "required",
            "duration" => "required",
            "total" => "required",
        ]);
        $new = new StudentApply();
        $new->create(array_merge(
            $data,
            ['user_id' => auth()->user()->id]
        ));

        return redirect('/home');
    }
}
