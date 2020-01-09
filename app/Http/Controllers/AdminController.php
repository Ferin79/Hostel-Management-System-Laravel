<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Institution;
use App\RoomDetails;
use App\SeatMatrix;
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
            'room_type' => 'required',
            'room_select' => 'required',
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

    public function seatMatrix()
    {
        return view('Profile.Admin.seatMatrix');
    }

    public function editDept()
    {
        $institute = Institution::all();
        return view('Profile.Admin.editDept',compact('institute'));
    }

    public function addInstitute()
    {
        $data = request()->validate([
           'institute' => 'required',
        ]);
        $new = new Institution();
        $new->create($data);
        return redirect('/admin/edit-dept');
    }

    public function getInstitution()
    {
        $institute = Institution::all();
        return $institute;
    }

    public function deleteInstitution()
    {
        $data = request('id');
        Institution::where('id',$data)->delete();
        return redirect('/admin/edit-dept');
    }

    public function addDepartment()
    {
        $data = request()->validate([
            "institute_id" => 'required',
            "department_name" => 'required'
        ]);

        $new = new Departments();
        $new->create($data);
        return redirect('/admin/edit-dept');
    }

    public function getDepartment()
    {
        $val = request('institute_id');
        $data = Departments::all();
        $data = $data->where('institute_id',$val);
        return $data;
    }
    public function showSeatMatrix()
    {
        return view('Profile.Admin.EditSeatMatrix');
    }

    public function addSeatMatrix()
    {
        $data = request()->validate([
           "institute_id" => 'required',
           "department_id" => 'required',
           "year" => 'required',
            "cast" => 'required',
            "boys_seat" => 'required',
            "girls_seat" => 'required',
        ]);
        $new = new SeatMatrix();
        $new->create($data);
        return redirect('/');
    }

    public function getSeatMatrix()
    {
        $data = SeatMatrix::all();
        return $data;
    }
}
