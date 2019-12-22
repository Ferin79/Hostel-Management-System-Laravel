<link href="{{ asset('css/Admin.pending.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
    @if(Auth::user()->email == 'darkKiller@gmail.com')
        <div class="container">
            <div class="row">
                @foreach($data as $user)
                    @if($user->user_type == 'admin' && $user->email != 'darkKiller@gmail.com' && $user->pending == '1')
                        <div class="card-wrapper">
                            <div class="info-wrapper">
                                <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                <h6>{{ $user->email }}</h6>
                            </div>
                            <div class="button-wrapper">
                                <form action="/admin/accept/{{ $user->id }}" method="POST">
                                    @csrf
                                    <button class="btn btn-info">Accept</button>
                                </form>
                                <form action="/admin/reject/{{ $user->id }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger">Reject</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <script>window.location = "/home";</script>
    @endif
@endsection
