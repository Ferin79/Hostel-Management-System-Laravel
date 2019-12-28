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
                <div class="card-body" style="text-align: center;margin: 10px;">
                    <h4 class="card-title">Room Name: {{ $value->room_type }}</h4>
                    <h5 class="card-title">Room Type: {{ $value->room_select }}</h5>
                    <p class="card-text">Price: <strong>{{ $value->price }} INR</strong> per head per Month</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
