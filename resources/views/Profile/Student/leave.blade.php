<link rel="stylesheet" href="{{ asset('css/removeSidebar.css') }}">
<script src="{{ asset('js/Student.leave.js') }}"></script>

@extends('layouts.app')

@section('content')

    @if(!empty($errors))
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <h1 style="text-align: center;">Leave Request</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <button class="btn btn-outline-primary" id="showleaveModal" data-toggle="modal" data-target="#exampleModalCenter">New Leave Request</button>
                @include('Profile.Student.leaveModal')
            </div>
        </div>
    </div>
@endsection
