<link href="{{ asset('css/Student.home.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center flex-wrap">
        @php
            $admin = env('ADMIN');
        @endphp
        @if($user == $admin)
            <div class="card-wrapper card-5" id="register-request">
                <div class="text-wrapper">
                    <h3>Register Request</h3>
                    @php
                        $Admin_len = 0;
                        $user_len = 0;
                        $sub_admin = 0;
                        foreach ($data as $val)
                            {
                                if($val->user_type == 'admin' && $val->pending == '1' && $val->email != 'test@admin.com')
                                    {
                                        $Admin_len = $Admin_len + 1;
                                    }
                                else if($val->user_type == 'admin' && $val->pending == '0' && $val->email != 'test@admin.com')
                                    {
                                        $sub_admin = $sub_admin + 1;
                                    }
                                else if($val->user_type == 'user')
                                    {
                                        $user_len = $user_len + 1;
                                    }
                                else
                                    {

                                    }
                            }
                    @endphp
                    <h5>{{ $Admin_len }}</h5>
                </div>
                <div class="icon-wrapper">
                    <i class="fa fa-calendar fa-4x"></i>
                </div>
            </div>

            <div id="manage-admin" class="card-wrapper card-4">
                <div class="text-wrapper">
                    <h3>Manage Sub-Admin</h3>
                    <h5>{{ $sub_admin }}</h5>
                </div>
                <div class="icon-wrapper">
                    <i class="fa fa-users fa-4x"></i>
                </div>
            </div>
            <div id="add_room" class="card-wrapper card-7">
                <div class="text-wrapper">
                    <h3>Add Rooms</h3>
                </div>
                <div class="icon-wrapper">
                    <i class="fa fa-bed fa-4x"></i>
                </div>
            </div>
        @endif

        <div id="manage-student" class="card-wrapper card-2">
            <div class="text-wrapper">
                <h3>Manage Student</h3>
                <h5>{{ $user_len ?? ''}}</h5>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-user fa-4x"></i>
            </div>
        </div>
        <div id="showRoom" class="card-wrapper card-1">
            <div class="text-wrapper">
                <h3>View All Rooms</h3>
                <h5>{{ $room_total ?? '' }}</h5>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-building fa-4x"></i>
            </div>
        </div>
        <div id="edit_dept" class="card-wrapper card-8">
            <div class="text-wrapper">
                <h3>Edit & Manage Department</h3>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-institution fa-4x"></i>
            </div>
        </div>
        <div class="card-wrapper card-3">
            <div class="text-wrapper">
                <h3>Edit Seats Matrix</h3>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-list-alt fa-4x"></i>
            </div>
        </div>

        <div id="myBtn" class="card-wrapper card-6">
            <div class="text-wrapper">
                <h3>Edit Profile</h3>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-sliders fa-4x"></i>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Admin.dashboard.js')}}" defer></script>
@endsection
