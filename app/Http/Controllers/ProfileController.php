<?php

namespace App\Http\Controllers;

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
}
