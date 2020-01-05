<link href="{{ asset('css/Admin.manageAdmin.css') }}" rel="stylesheet">
<script src="{{ asset('js/Admin.manageStudent.js')}}"></script>
@extends('layouts.app')

@section('main_content_sidebar')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->email == $admin)
        <h1 class="d-flex justify-content-center align-items-center p-3">Manage Admins</h1>
        <div class="container">
            <div class="row">
                @if(count($data) > 1)
                    @foreach($data as $user)
                        @if($user->user_type == 'admin' && $user->email != $admin && $user->pending == '0')
                            <div class="col-md-6  col-sm-12">
                                <div class="card-wrapper">
                                    <div class="info-wrapper">
                                        <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                        <h6>{{ $user->email }}</h6>
                                        <hr/>
                                        <h6>Department: {{$user->id}}</h6>
                                        <h6>Rooms Added: {{ $user->id }}</h6>
                                    </div>
                                    <div class="button-wrapper">
                                        <form method="POST" class="delete_acc"
                                              action="/admin/reject/{{ $user->id }}">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Delete Account</button>
                                        </form>
                                        <form method="POST" class="block_acc" action="/admin/block/{{ $user->id }}">
                                            @csrf
                                            <button class="btn btn-secondary" type="submit">Block Account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="w-100 d-flex justify-content-center align-items-center p-5 m-5">
                        <h4>No Admin To Manage</h4>
                    </div>
                @endif
            </div>
        </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
