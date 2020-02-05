<?php

namespace App\Http\Controllers;

use App;
use App\Departments;
use App\Institution;
use App\RoomDetails;
use App\SeatMatrix;
use App\MeritList;
use App\StudentApply;
use App\StudentEducation;
use App\User;
use App\CopySeatMatrix;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $data = $user->all()->where('pending', '1');
        return view('Profile.Admin.pending', compact('data'));
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
        $data = $data->where('user_type', 'admin');
        $data = $data->where('pending', '0');
        return view('Profile.Admin.manageAdmin', compact('data'));
    }

    public function manageStudent()
    {
        $data = User::all()->where('user_type', 'user');
        return view('Profile.Admin.manageStudent', compact('data'));
    }

    public function showAddRoom()
    {
        return view('Profile.Admin.addRoom');
    }

    public function addRoom()
    {
        $data = request()->validate([
            'room_type' => 'required',
            'price' => 'required',
            'department_id' => 'required',
            'room_number' => ['required','unique:room_details'],
            'capacity' => 'required',
            'term' => 'required|integer|between:1,10',
            'gender' => 'required',
            // 'image1' => ['required', 'image'],
            // 'image2' => ['required', 'image'],
            // 'room_select' => 'required',
        ]);
        $data['is_ac'] = request()->has('is_ac');
        $data['is_guest'] = request()->has('is_guest');
        $data['institution_id'] = Departments::find($data['department_id'])->Institution->id;
        $imageArray = [];
        if (request('image1') && request('image2')) {
            $imagePath1 = request('image1')->store('uploads/Rooms', 'public');
            $image1 = Image::make(public_path("storage/{$imagePath1}"))->fit(1280, 720);
            $image1->save();
            $imagePath2 = request('image2')->store('uploads/Rooms', 'public');
            $image2 = Image::make(public_path("storage/{$imagePath2}"))->fit(1280, 720);
            $image2->save();
            $imageArray = [
                'image1' => $imagePath1,
                'image2' => $imagePath2
            ];
        }
        $new = new RoomDetails();
        $merge = array_merge(
            $data,
            $imageArray
        );
        $new->fill($merge);
        $new->save();


        return redirect('/admin/add-room');
    }

    public function seatMatrix()
    {
        return view('Profile.Admin.seatMatrix');
    }

    public function editDept()
    {
        $institute = Institution::all();
        return view('Profile.Admin.editDept', compact('institute'));
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
        Institution::where('id', $data)->delete();
        return redirect('/admin/edit-dept');
    }

    public function addDepartment()
    {
        $data = request()->validate([
            "institution_id" => 'required',
            "department_name" => 'required'
        ]);

        $new = new Departments();
        $new->create($data);
        return redirect('/admin/edit-dept');
    }

    public function getDepartment()
    {
        $val = request('institution_id');
        $data = Departments::all();
        $data = $data->where('institution_id', $val);
        return $data;
    }

    public function showSeatMatrix()
    {
        return view('Profile.Admin.EditSeatMatrix');
    }

    public function addSeatMatrix()
    {
        if(CopySeatMatrix::all()->count() > 0){
        return 'Cannot edit after copy seat matrix generated';
        }

        $data = request()->validate([
            "institution_id" => 'required',
            "department_id" => 'required',
            "year" => 'required',
            "cast" => 'required',
            "boys_seat" => 'required',
            "girls_seat" => 'required',
        ]);
//        dd($data);
        $new = SeatMatrix::firstOrNew([
            'institution_id' => $data['institution_id'],
            'department_id' => $data['department_id'],
            'year' => $data['year'],
            'cast' => $data['cast']
            ]);
//        dd(SeatMatrix::where('year', '6')->get()->first());
        dd($new);
        $new->boys_seat = $data['boys_seat'];
        $new->girls_seat = $data['girls_seat'];
        $new->save();
        return redirect('/');
    }

    public function getSeatMatrix()
    {
        $data = SeatMatrix::all();
        $institute = Institution::all();
        $department = Departments::all();
        //get institute name
        for ($i = 0; $i < $data->count(); $i++) {
            $in = $institute->where("id", $data[$i]["institution_id"])->toArray();
            foreach ($in as $value) {
                $data[$i]["institution_id"] = $value["institute"];
            }
        // get department name
            $in = $department->where('id', $data[$i]['department_id'])->toArray();
            foreach ($in as $value) {
                $data[$i]["department_id"] = $value["department_name"];
            }
        }
        return $data;
    }

    public function showStudentApply()
    {
        $data = StudentApply::all();
        return view('Profile.Admin.studentApply', compact('data'));
    }

    public function generate_seat_matrix()
    {
        $applications = StudentApply::all();
        $ssc_hsc = '';
        $clg = '';
        $depts = Departments::all();
        foreach ($applications as $application) {
            $joined = $application->user->select('*')
                ->join('student_education', 'users.id', '=', 'student_education.user_id')
                ->join('student_applies', 'users.id', '=', 'student_applies.user_id')
                ->join('student_profiles', 'users.id', '=', 'student_profiles.user_id')
                ->join('departments', 'student_education.department_id', '=', 'departments.id');

            $ssc_hsc = $joined->where('in_ssc_hsc', 1)->get()->sortByDesc('percentage');

            $joined = $application->user->select('*')
                ->join('student_education', 'users.id', '=', 'student_education.user_id')
                ->join('student_applies', 'users.id', '=', 'student_applies.user_id')
                ->join('student_profiles', 'users.id', '=', 'student_profiles.user_id');
            $clg = $joined->where('in_ssc_hsc', 0)->get()->sortByDesc('cgpa');
        }


        foreach ($ssc_hsc as $data) {
            $merit_list = MeritList::firstOrCreate(['user_id' => $data->user_id ]);
            $merit_list->user_id = $data->user_id;
            $merit_list->institution_id = $data->institution_id;
            $merit_list->department_id = $data->department_id;
            $merit_list->in_ssc_hsc = true;
            $merit_list->in_college = false;
            $merit_list->cgpa = $data->cgpa;
            $merit_list->percentage = $data->percentage;
            $merit_list->term = $data->term;
            $merit_list->cast = $data->cast;
            $merit_list->gender = $data->gender;
            $merit_list->save();
        }

        foreach ($clg as $data) {
            $merit_list = MeritList::firstOrCreate(['user_id' => $data->user_id ]);
            $merit_list->users_id = $data->user_id;
            $merit_list->institution_id = $data->institution_id;
            $merit_list->department_id = $data->department_id;
            $merit_list->in_ssc_hsc = false;
            $merit_list->in_college = true;
            $merit_list->cgpa = $data->cgpa;
            $merit_list->percentage = $data->percentage;
            $merit_list->term = $data->term;
            $merit_list->cast = $data->cast;
            $merit_list->gender = $data->gender;
            $merit_list->save();
        }

        // Create MasterMeritList migration
        // ADD create MasterMeritList button on edit_seat_matrix page, after submitting that button
        // Normalize cast field

        $merit_list = MeritList::all();

        return view('Profile.Admin.seatMat', compact('ssc_hsc', 'clg', 'depts','merit_list'));

//        $applications = StudentApply::all();
//        foreach ($applications as $application) {
//            $joined = $application->user->select('*')
//                ->join('student_education', 'users.id', '=', 'student_education.user_id')
//                ->join('student_applies', 'users.id', '=', 'student_applies.user_id')
//                ->join('student_profiles', 'users.id', '=', 'student_profiles.user_id');
//            $ssc_hsc = $joined->where('in_ssc_hsc', 1)->get()->sortByDesc('percentage');
//
//            $joined = $application->user->select('*')
//                ->join('student_education', 'users.id', '=', 'student_education.user_id')
//                ->join('student_applies', 'users.id', '=', 'student_applies.user_id')
//                ->join('student_profiles', 'users.id', '=', 'student_profiles.user_id');
//            $college = $joined->where('in_college', 1)->get()->sortByDesc('cgpa');
//
//        }
//            $pdf = App::make('dompdf.wrapper');
//
//            $output = "";
//            foreach ($ssc_hsc as $value)
//            {
//                $output =  $output . "
//                    <ul>
//                        <li>".$value."</li>
//                    </ul>
//                ";
//            }
//            dd($ssc_hsc);
//            $pdf->loadHTML($output);
//            return $pdf->stream();
    }

    public function generateMasterSeatMatrix()
    {
        $temp_seat_matrix = SeatMatrix::all();

        foreach($temp_seat_matrix as $seat_matrix){
            $master_seat_matrix = CopySeatMatrix::firstOrNew(['institution_id' => $seat_matrix->institution_id ,
                                                                'department_id' => $seat_matrix->department_id ,
                                                                'year' => $seat_matrix->year ,
                                                                'cast' => $seat_matrix->cast]);
            $master_seat_matrix->institution_id = $seat_matrix->institution_id;
            $master_seat_matrix->department_id = $seat_matrix->department_id;
            $master_seat_matrix->year = $seat_matrix->year;
            $master_seat_matrix->cast = $seat_matrix->cast;
            $master_seat_matrix->boys_seat = $seat_matrix->boys_seat;
            $master_seat_matrix->girls_seat = $seat_matrix->girls_seat;
            $master_seat_matrix->save();
        }
        dd(CopySeatMatrix::all());

    }
    public function allotSeats(){
        $merit_list = MeritList::where('in_ssc_hsc',1)->get();

//        dd($merit_list);
        $alloted_seats = collect([]);
        foreach($merit_list as $item){
//            dd($item);
           $seat_matrix =  SeatMatrix::where([
                ['institution_id' , $item->institution_id],
                ['department_id' , $item->department_id],
                ['year' , $item->term],
                ['cast' , $item->cast],
            ])->get()->first();
           if($seat_matrix){
               if ($item->gender == 'male'){
                   if ($seat_matrix->boys_seat > 0){
                       $seat_matrix->boys_seat -= 1;
                       $alloted_seats->add($item);
                   }
               }elseif ($item->gender == 'female'){
                   if ($seat_matrix->girls_seat > 0){
                       $seat_matrix->girls_seat -= 1;
                       $alloted_seats->add($item);
                   }
               }
//               $seat_matrix->save();
           }

        }
        dd($alloted_seats);

    }
}
