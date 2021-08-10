<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Institution;
use App\ParentDetail;
use App\RoomDetails;
use App\StudentApply;
use App\StudentEducation;
use App\StudentLeave;
use App\StudentProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $user_edu = StudentEducation::where('user_id',$user->id)->get();;
            return view('Profile.Student.index',compact('user','user_edu'));
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
            'image' => 'image',
        ]);              
        if(request('image'))
        {
            $imagePath = request('image')->store('uploads/StudentProfile','public');
            // $image = Image::make(public_path("storage/{$imagePath}"))->fit(300,300);
            // $image->save();
            $imageArray = ['image' => $imagePath];
        }
        error_log("1");

        auth()->user()->StudentProfile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));
        error_log("2");
        if(request('degree') == "1")
        {
            StudentEducation::where("user_id" ,Auth()->user()->id)->update(
                [
                    "in_ssc_hsc" => "1",
                    "in_college" => "0",
                    "percentage" => request('marks'),
                    "cgpa" => "-1",
                    "current_sem" => "-1",
                    "department_id" => request('department'),
                    "user_id" => Auth()->user()->id
            ]);
        }
        else
        {
            StudentEducation::where("user_id" , Auth()->user()->id)->update(
                [
                    "in_ssc_hsc" => "0",
                    "in_college" => "1",
                    "cgpa" => request('marks'),
                    "percentage" => "-1",
                    "current_sem" => request('sem'),
                    "department_id" => request('department'),
                    "user_id" => Auth()->user()->id
                ]
            );
        }
        error_log("3");
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
            $user_edu = StudentEducation::where('user_id', auth()->user()->id)->get();
            $user_edu = $user_edu[0];
            $dept_name = Departments::where('id',$user_edu->department_id)->get();
            if($dept_name->count() > 0)
            {
                $dept_name = $dept_name[0];
                $dept_name = $dept_name->department_name;
            }
            else
            {
                $dept_name = null;
            }
            return view('Profile.Student.applyRoom',compact('user','roomDetails','user_edu','dept_name'));
        }
    }
    public function addApply()
    {
        dd(request()->all());
        $data = request()->validate([
            "term" => "required",
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
        $data = request()->validate([
            "guard_name" => 'required',
            "guard_email" => 'required',
            "guard_number" => 'required',
        ]);
        $new = new ParentDetail();
        $new->create(array_merge(
            $data,-
            ['user_id' => auth()->user()->id]
        ));

        return redirect('/home');
    }
    public function getInstitution() {
        $data = Institution::all();
        return $data;
    }

    public function getDepartment()
    {
        $institute_id = request('institute_id');
        $data = Departments::all();        
        $data = $data->where('institution_id',$institute_id);
        return $data;
    }

    public function getLeave()
    {
        return view('Profile.Student.leave');
    }

    public function addLeave()
    {
        $data = request()->validate([
            "reason" => "required",
            "startfrom" => 'required',
            "duration" => 'required',
            "contact" => 'required'
        ]);

        $new = new StudentLeave();
        $new->reason = $data['reason'];
        $new->startfrom = $data['startfrom'];
        $new->duration = $data['duration'];
        $new->contact = $data['contact'];
        $new->user_id = Auth::user()->id;
        $new->isApproved = 0;
        $new->save();/*(array_merge([
            $data,
            ['user_id' => Auth::user()->id],
            ['isApproved' => '0']
        ]));*/
        return "done";
    }
}
