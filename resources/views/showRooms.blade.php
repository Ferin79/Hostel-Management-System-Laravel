<link href="{{ asset('css/showRooms.css') }}" rel="stylesheet"/>
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($data as $value)
            <div class="card card-width m-5">
                <div id="carouselExampleIndicators{{$value->id}}" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators{{$value->id}}" data-slide-to="0"
                            class="active"></li>
                        <li data-target="#carouselExampleIndicators{{$value->id}}" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/storage/{{ $value->image1 }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/storage/{{ $value->image2 }}" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators{{$value->id}}" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators{{$value->id}}" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Room No: {{ $value->room_no }}</h4>
                    <h5 class="card-title">Department: {{ $value->department }}</h5>
                    <p class="card-text">{{ $value->ac ? 'With A.C' : 'Without A.C' }}.</p>
                    <p class="card-text">Price: <strong>{{ $value->price }} INR</strong> per head per Month</p>
                    <p class="card-text">Total Beds Available: <strong>{{ $value->bed_no }}</strong></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
