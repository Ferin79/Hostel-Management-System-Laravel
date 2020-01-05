<link href="{{ asset('css/Admin.manageAdmin.css') }}" rel="stylesheet">
<script src="{{ asset('js/Admin.manageStudent.js')}}"></script>
@extends('layouts.app')

@section('main_content_sidebar')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->email == $admin)
        <h1 class="d-flex justify-content-center align-items-center p-3">Manage Pending Register Request</h1>
        <div class="container">
            <div class="row">

                @if(count($data) > 0)
                    @foreach($data as $user)
                        @if($user->user_type == 'admin' && $user->email != $admin && $user->pending == '1')
                            <div class="col-md-6 col-sm-12">
                                <div class="card-wrapper">
                                    <div class="info-wrapper">
                                        <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                        <h6>{{ $user->email }}</h6>
                                    </div>
                                    <div class="button-wrapper">
                                        <form class="accept_acc" action="/admin/accept/{{ $user->id }}" method="POST">
                                            @csrf
                                            <button class="btn btn-info">Accept</button>
                                        </form>
                                        <form class="delete_acc" action="/admin/reject/{{ $user->id }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger">Reject</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="d-flex w-100 justify-content-center align-items-center p-5 m-5">
                        <h4>No Account Pending</h4>
                    </div>
                @endif
            </div>
        </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
