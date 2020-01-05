<link href="{{ asset('css/Admin.manageAdmin.css') }}" rel="stylesheet">
<script src="{{ asset('js/Admin.manageStudent.js')}}"></script>
@extends('layouts.app')

@section('main_content_sidebar')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->user_type == 'admin')
        <h1 class="d-flex justify-content-center align-items-center p-3">Manage Students</h1>
        <div class="container">
            <div class="row">
                @if(count($data) > 0)
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
                                        <form class="show_details">
                                            <button class="btn btn-primary showData {{$user->id}}" data-toggle="modal"
                                                    data-target="#exampleModalCenter">View Details
                                            </button>
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
                @else
                    <div class="w-100 d-flex justify-content-center align-items-center p-5 m-5">
                        <h4>No Students To Manage</h4>
                    </div>
                @endif
            </div>
        </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
