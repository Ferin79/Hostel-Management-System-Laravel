@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-sm-12">
                <h1>Unauthorized</h1>
                <h3 class="pt-5">Some Related Links</h3>
                <h6><a href="/home">Home</a></h6>
                @if(Auth::user()->user_type == 'admin')
                    <h6><a href="/admin/pending">Pending Request</a></h6>
                    <h6><a href="/admin/manage-admin">Manage Admins</a></h6>
                @else
                @endif
            </div>
            <div class="col-md-6 col-sm-12">
                <img class="img-fluid" src="{{ url('images/unauth.gif') }}" alt="">
            </div>
        </div>
    </div>
@endsection
