<link rel="stylesheet" href="{{ asset('css/Admin.editDept.css') }}">
@extends('layouts.app')

@section('main_content_sidebar')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->email == $admin)
        <h1 class="d-flex justify-content-center align-items-center p-3">Manage & Edit Department</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">

                </div>
                <div class="col-md-6 col-sm-12">

                </div>
            </div>
        </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
