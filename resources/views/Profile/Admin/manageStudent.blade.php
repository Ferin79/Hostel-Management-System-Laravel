<link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
<link href="{{ asset('css/Admin.manageAdmin.css') }}" rel="stylesheet">
<script src="{{ asset('js/Admin.manageStudent.js')}}"></script>
@extends('layouts.app')

@section('admin-content')
    @if(Auth::user()->user_type == 'admin')
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Hey, {{ Auth::user()->first_name }}</div>
                <div class="list-group list-group-flush">
                    <a href="/home" class="list-group-item list-group-item-action bg-light">Home</a>
                    <a href="/admin/pending" class="list-group-item list-group-item-action bg-light">Register
                        Request</a>
                    <a href="/admin/manage-admin" class="list-group-item list-group-item-action bg-light">Manage
                        Admin</a>
                    <a href="/admin/manage-student" class="list-group-item list-group-item-action bg-light">Manage
                        Student</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Rooms</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Edit Seats Matrix</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Edit Profile</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
                <h1 class="d-flex justify-content-center align-items-center p-3">Manage Students</h1>
                <div class="container">
                    <div class="row">
                        @foreach($data as $user)
                            @if($user->user_type == 'user')
                                <div class="col-md-6  col-sm-12">
                                    <div class="card-wrapper">
                                        <div class="img-wrapper">
                                            <img class="rounded-circle img-profile" height="100" width="100"
                                                 src="/storage/{{ $user->StudentProfile->image }}" alt="">
                                        </div>
                                        <div class="info-wrapper">
                                            <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                            <h6>{{ $user->email }}</h6>
                                            <hr/>
                                            <h6>Department: {{$user->StudentProfile->department}}</h6>
                                            <h6>Sem: {{ $user->StudentProfile->sem }}</h6>
                                        </div>
                                        <div class="button-wrapper">
                                            <form onsubmit="(e) => {e.preventDefault();}">
                                                <button class="btn btn-primary showData {{$user->id}}" data-toggle="modal" data-target="#exampleModalCenter">View Details</button>
                                            </form>
                                            <form method="POST" class="delete_acc" action="/admin/reject/{{ $user->id }}">
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Delete Account</button>
                                            </form>
                                        </div>
                                    </div>
                                    @include('Profile.Admin.Modal')
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
