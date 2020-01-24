@extends('layouts.app')
<link rel="stylesheet" href="{{ asset("css/removeSidebar.css") }}">
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h2>You Have Already Applied for Hostel Room</h2>
        <h5 class="m-2">Sit Back and Relax till Shortlisting date</h5>
        <div class="p-3 m-3">
            <img class="img-fluid" src="{{asset('images/relax.gif')}}">
        </div>
    </div>
@endsection
