<link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
<link href="{{ asset('css/Admin.manageAdmin.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js')}}"></script>
<script src="{{ asset('js/Admin.manageStudent.js')}}"></script>
@extends('layouts.app')

@section('admin-content')
    @if(Auth::user()->email == 'test@admin.com')
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

                <div class="container">
                    <div class="row">

                        @foreach($data as $user)
                            @if($user->user_type == 'admin' && $user->email != 'test@admin.com' && $user->pending == '1')
                                <div class="col-md-6 col-sm-12">
                                    <div class="card-wrapper">
                                        <div class="info-wrapper">
                                            <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                            <h6>{{ $user->email }}</h6>
                                        </div>
                                        <div class="button-wrapper">
                                            <form action="/admin/accept/{{ $user->id }}" method="POST">
                                                @csrf
                                                <button class="btn btn-info">Accept</button>
                                            </form>
                                            <form action="/admin/reject/{{ $user->id }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger">Reject</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
