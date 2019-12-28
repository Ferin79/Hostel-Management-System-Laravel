<link href="{{ asset('css/Student.home.css') }}" rel="stylesheet">
<script src="{{ asset('js/Student.Home.js')}}"></script>

@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center flex-wrap">
        <div id="apply_now" class="card-wrapper card-5">
            <div class="text-wrapper">
                <h3>Apply Now</h3>
                <h5>Due Date: 31-12-2020</h5>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-calendar fa-4x"></i>
            </div>
        </div>

        <div class="card-wrapper card-1">
            <div class="text-wrapper">
                <h3>Rooms Available</h3>
                <h5>20</h5>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-building fa-4x"></i>
            </div>
        </div>

        <div class="card-wrapper card-3">
            <div class="text-wrapper">
                <h3>View Seats Matrix</h3>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-list-alt fa-4x"></i>
            </div>
        </div>

        <div class="card-wrapper card-4">
            <div class="text-wrapper">
                <h3>Mess's Menu</h3>
            </div>
            <div class="icon-wrapper">
                <img src="{{url('images/pizza.png')}}">
            </div>
        </div>

        <div id="edit_profile" class="card-wrapper card-6">
            <div class="text-wrapper">
                <h3>Edit Profile</h3>
            </div>
            <div class="icon-wrapper">
                <i class="fa fa-sliders fa-4x"></i>
            </div>
        </div>
    </div>
@endsection
