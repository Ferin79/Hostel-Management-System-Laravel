<link href="{{ asset('css/Admin.manageAdmin.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
    @if(Auth::user()->email == 'test@admin.com')
    <div class="container">
        <div class="row">
            @foreach($data as $user)
                @if($user->user_type == 'admin' && $user->email != 'test@admin.com' && $user->pending == '0')
                    <div class="col-md-6  col-sm-12">
                        <div class="card-wrapper">
                            <div class="info-wrapper">
                                <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                <h6>{{ $user->email }}</h6>
                                <hr />
                                <h6>Department: {{$user->id}}</h6>
                                <h6>Rooms Added: {{ $user->id }}</h6>
                            </div>
                            <div class="button-wrapper">
                                <form method="POST" action="/admin/reject/{{ $user->id }}">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete Account</button>
                                </form>
                                <form method="POST" action="/admin/block/{{ $user->id }}">
                                    @csrf
                                    <button class="btn btn-secondary" type="submit">Block Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @endif
@endsection
