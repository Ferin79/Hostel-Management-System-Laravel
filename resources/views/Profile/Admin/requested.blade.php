@extends('layouts.app')
@section('content')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->user_type == 'admin')
    <div class="container">
        <div class="row d-flex flex-row justify-content-center align-items-center">
            <div class="col-md-6 col-sm-12">
                <h3>Ohhhhh !!!!!!!</h3>
                <h1 class="pt-5">Sit Back & Relax</h1>
                <h2 class="pt-5">Register Request Pending</h2>
            </div>
            <div class="col-md-6 col-sm-12">
                <img class="img-fluid" src="{{ url('/images/sit back.gif') }}" alt="">
            </div>
        </div>
    </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
