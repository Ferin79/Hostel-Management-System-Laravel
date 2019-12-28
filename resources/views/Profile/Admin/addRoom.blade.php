<link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
<link href="{{ asset('css/Admin.addRoom.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->user_type == 'admin')
        <h1 class="d-flex justify-content-center align-items-center p-3">Add Rooms</h1>
        <div class="container">
            <div class="row">
                <form method="POST" id="addRoom__form" enctype="multipart/form-data" action="/admin/add-room">
                    @csrf
                    <div class="col-sm-12 input_field_area">

                        <div class="form-group row">
                            <label for="room-no" class="col-md-4 col-form-label text-md-right">Room No</label>
                            <div class="col-md-8">
                                <input id="room-no" type="text"
                                       class="form-control @error('room-no') is-invalid @enderror"
                                       name="room_no" value="{{ old('room-no') }}" required
                                       autocomplete="room-no" placeholder="Room No Like: D-202" autofocus>

                                @error('room-no')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department"
                                   class="col-md-4 col-form-label text-md-right">Department</label>
                            <div class="col-md-8">
                                <select class="form-control" required name="department" id="department">
                                    <option value="0" selected disabled>Select Department</option>
                                    <option value="computer">Computer</option>
                                    <option value="Electrical">Electrical</option>
                                    <option value="Civil">Civil</option>
                                    <option value="mechanical">Mechanical</option>
                                    <option value="ec">E.C</option>
                                </select>
                                @error('department')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ac"
                                   class="col-md-4 col-form-label text-md-right">A.C</label>
                            <div class="col-md-8">
                                <input id="ac" type="radio"
                                       class="@error('ac') is-invalid @enderror" name="ac"
                                       value="1"
                                ><label>With A.C</label>

                                <input id="nonac" type="radio"
                                       class="@error('ac') is-invalid @enderror" name="ac"
                                       value="0"
                                ><label>Non A.C</label>
                                @error('ac')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_bed" class="col-md-4 col-form-label text-md-right">Number Of Beds</label>
                            <div class="col-md-8">
                                <input id="number_bed" type="number" min="1" max="10"
                                       class="form-control @error('number_bed') is-invalid @enderror"
                                       name="bed_no" value="{{ old('number_bed') }}" required
                                       autocomplete="number_bed" placeholder="Number Of Beds" autofocus>

                                @error('number_bed')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price per Head</label>
                            <div class="col-md-8">
                                <input id="price" type="number" min="1"
                                       class="form-control @error('number_bed') is-invalid @enderror"
                                       name="price" value="{{ old('price') }}" required
                                       autocomplete="price" placeholder="Price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image1" class="col-md-4 col-form-label text-md-right">Image 1</label>
                            <div class="col-md-8">
                                <input id="image1" type="file" onchange="loadFile(event)"
                                       class="form-control @error('image1') is-invalid @enderror"
                                       name="image1" required autofocus accept="image/*">
                                @error('image1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image2" class="col-md-4 col-form-label text-md-right">Image 2</label>
                            <div class="col-md-8">
                                <input id="image2" type="file"
                                       class="form-control @error('image2') is-invalid @enderror"
                                       name="image2" required autofocus accept="image/*">
                                @error('image2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pl-5 ml-5 pb-5">
                            <button type="submit" class="btn btn-primary ml-5 mt-3">Add Room</button>
                        </div>
                    </div>
                    <div class="col col-sm-12 img-wrapper">
                        <img id="blah1" class="img-fluid" src="#" alt="your image"/>
                        <img id="blah2" src="#" class="img-fluid" alt="your image"/>
                    </div>
                </form>
            </div>
            <script>
                function readURL1(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah1').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#image1").change(function () {
                    readURL1(this);
                });


                function readURL2(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah2').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#image2").change(function () {
                    readURL2(this);
                });
            </script>
        </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
