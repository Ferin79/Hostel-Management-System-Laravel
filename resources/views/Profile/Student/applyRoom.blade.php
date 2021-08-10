<link href="{{ asset('css/Student.applyRoom.css') }}" rel="stylesheet"/>
@extends('layouts.app')
@php
    $disable_submit_btn = 0;
@endphp
@if($errors->any())
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
@section('content')
    @if(Auth::user()->user_type == 'user')
        <div class="container">
            <div class="row all-wrapper">
                <div class="col-md-6 col-sm-12">
                    <div class="basic-details-wrapper">
                        <h4>Please Confirm Your Information.</h4>
                        <p>You Can Edit Your Details <a href="/student/profile">Here</a></p>
                        <hr/>
                        <h4>Basic Details</h4>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">First
                                Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                       class="form-control @error('first_name') is-invalid @enderror"
                                       name="first_name"
                                       value="{{ $user->first_name }}" required autocomplete="first_name"
                                       readonly placeholder="First name" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->first_name ? "" : "Please Fill Your First Name" }}</h6>
                                {{ $user->first_name ? '' : $disable_submit_btn = 1 }}

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last
                                Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                       class="form-control @error('last_name') is-invalid @enderror"
                                       name="last_name"
                                       value="{{ $user->last_name }}" required autocomplete="last_name"
                                       readonly placeholder="Last name" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->last_name ? "" : "Please Fill Your Last Name" }}</h6>
                                {{ $user->last_name ? '' : $disable_submit_btn = 1 }}

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ $user->email }}" readonly required autocomplete="email"
                                       placeholder="email" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->email ? "" : "Please Fill Your Email" }}</h6>
                                {{ $user->email ? '' : $disable_submit_btn = 1 }}

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Contact
                                Number</label>

                            <div class="col-md-6">
                                <input id="number" type="text"
                                       class="form-control @error('number') is-invalid @enderror" name="number"
                                       value="{{ $user->number }}" required autocomplete="number"
                                       readonly placeholder="number" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->number ? "" : "Please Fill Your Number" }}</h6>
                                {{ $user->number ? '' : $disable_submit_btn = 1 }}

                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <input id="male" type="radio"
                                       {{ $user->StudentProfile->gender == 'male' ? 'checked' : null }}
                                       class="@error('gender') is-invalid @enderror" disabled name="gender"
                                       value="male"
                                ><label>Male</label>

                                <input id="female" type="radio"
                                       {{ $user->StudentProfile->gender == 'female' ? 'checked' : null }}
                                       class="@error('gender')  is-invalid @enderror" disabled name="gender"
                                       value="female"
                                ><label>Female</label>

                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cast" class="col-md-4 col-form-label text-md-right">Cast</label>

                            <div class="col-md-6">
                                <input class="form-control"
                                    @php
                                        if($user->StudentProfile->cast == 'gen')
                                        {
                                            $cast = "GENERAL";
                                        }
                                        else if($user->StudentProfile->cast == "obc")
                                            {
                                                $cast = "OBC";
                                            }
                                        else if($user->StudentProfile->cast == "sc")
                                            {
                                                $cast = "ST";
                                            }
                                        else if($user->StudentProfile->cast == "sc")
                                            {
                                                $cast = "SC";
                                            }
                                        else if($user->StudentProfile->cast == "oth")
                                            {
                                                $cast = "OTHERS";
                                            }
                                        else
                                            {
                                                $cast = null;
                                                $disable_submit_btn = 1;
                                            }
                                    @endphp
                                value="{{ $cast ?? '' }}" readonly>
                                <h6 style="color: red;padding-top: 10px">{{ $cast ? '' :  'Please Enter Your Cast' }}</h6>

                                @error('cast')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="address-wrapper pt-5">
                        <hr/>
                        <h4>Address</h4>

                        <div class="form-group row">
                            <label for="lane1" class="col-md-4 col-form-label text-md-right">Lane 1</label>

                            <div class="col-md-6">
                                <input id="lane1" type="text"
                                       class="form-control @error('lane1') is-invalid @enderror" name="lane1"
                                       value="{{ $user->StudentProfile->lane1 }}" readonly required
                                       autocomplete="lane1"
                                       placeholder="lane1" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->StudentProfile->lane1 ? "" : "Please Fill Your Lane1" }}</h6>
                                {{ $user->StudentProfile->lane1 ? '' : $disable_submit_btn = 1 }}

                                @error('lane1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lane2" class="col-md-4 col-form-label text-md-right">Lane 2</label>

                            <div class="col-md-6">
                                <input id="lane2" type="text"
                                       class="form-control @error('lane2') is-invalid @enderror" name="lane2"
                                       value="{{ $user->StudentProfile->lane2 }}" readonly required
                                       autocomplete="lane2"
                                       placeholder="lane2" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->StudentProfile->lane2 ? "" : "Please Fill Your Lane2" }}</h6>
                                {{ $user->StudentProfile->lane2 ? '' : $disable_submit_btn = 1 }}

                                @error('lane2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lane3" class="col-md-4 col-form-label text-md-right">Lane 3/
                                Lankmark</label>

                            <div class="col-md-6">
                                <input id="lane3" type="text"
                                       class="form-control @error('lane3') is-invalid @enderror" name="lane3"
                                       value="{{ $user->StudentProfile->lane3 }}" readonly autocomplete="lane3"
                                       placeholder="lane3" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->StudentProfile->lane3 ? "" : "Please Fill Your Lane3" }}</h6>
                                {{ $user->StudentProfile->lane3 ? '' : $disable_submit_btn = 1 }}

                                @error('lane3')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text"
                                       class="form-control @error('city') is-invalid @enderror" name="city"
                                       value="{{ $user->StudentProfile->city }}" readonly required
                                       autocomplete="city"
                                       placeholder="city" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->StudentProfile->city ? "" : "Please Fill Your City" }}</h6>
                                {{ $user->StudentProfile->city ? '' : $disable_submit_btn = 1 }}


                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                            <div class="col-md-6">
                                <select class="form-control" disabled name="state" id="state" required>
                                    <option selected disabled>Select State</option>
                                    <option
                                        value="ap" {{ $user->StudentProfile->state == 'ap' ? 'selected' : null}}>
                                        Andhra Pradesh
                                    </option>
                                    <option
                                        value="ar" {{ $user->StudentProfile->state == 'ar' ? 'selected' : null}}>
                                        Arunachal Pradesh
                                    </option>
                                    <option
                                        value="as" {{ $user->StudentProfile->state == 'as' ? 'selected' : null}}>
                                        Assam
                                    </option>
                                    <option
                                        value="br" {{ $user->StudentProfile->state == 'br' ? 'selected' : null}}>
                                        Bihar
                                    </option>
                                    <option
                                        value="cg" {{ $user->StudentProfile->state == 'cg' ? 'selected' : null}}>
                                        Chhattisgarh
                                    </option>
                                    <option
                                        value="ga" {{ $user->StudentProfile->state == 'ga' ? 'selected' : null}}>
                                        Goa
                                    </option>
                                    <option
                                        value="gj" {{ $user->StudentProfile->state == 'gj' ? 'selected' : null}}>
                                        Gujarat
                                    </option>
                                    <option
                                        value="hr" {{ $user->StudentProfile->state == 'hr' ? 'selected' : null}}>
                                        Haryana
                                    </option>
                                    <option
                                        value="hp" {{ $user->StudentProfile->state == 'hp' ? 'selected' : null}}>
                                        Himachal Pradesh
                                    </option>
                                    <option
                                        value="jh" {{ $user->StudentProfile->state == 'jh' ? 'selected' : null}}>
                                        Jharkhand
                                    </option>
                                    <option
                                        value="ka" {{ $user->StudentProfile->state == 'ka' ? 'selected' : null}}>
                                        Karnataka
                                    </option>
                                    <option
                                        value="kl" {{ $user->StudentProfile->state == 'kl' ? 'selected' : null}}>
                                        Kerala
                                    </option>
                                    <option
                                        value="mp" {{ $user->StudentProfile->state == 'mp' ? 'selected' : null}}>
                                        Madhya Pradesh
                                    </option>
                                    <option
                                        value="mh" {{ $user->StudentProfile->state == 'mh' ? 'selected' : null }}>
                                        Maharashtra
                                    </option>
                                    <option
                                        value="mn" {{ $user->StudentProfile->state == 'mn' ? 'selected' : null}}>
                                        Manipur
                                    </option>
                                    <option
                                        value="ml" {{ $user->StudentProfile->state == 'ml' ? 'selected' : null}}>
                                        Meghalaya
                                    </option>
                                    <option
                                        value="mz" {{ $user->StudentProfile->state == 'mz' ? 'selected' : null}}>
                                        Mizoram
                                    </option>
                                    <option
                                        value="nl" {{ $user->StudentProfile->state == 'nl' ? 'selected' : null}}>
                                        Nagaland
                                    </option>
                                    <option
                                        value="od" {{ $user->StudentProfile->state == 'od' ? 'selected' : null}}>
                                        Odisha
                                    </option>
                                    <option
                                        value="pb" {{ $user->StudentProfile->state == 'pb' ? 'selected' : null}}>
                                        Punjab
                                    </option>
                                    <option
                                        value="rj" {{ $user->StudentProfile->state == 'rj' ? 'selected' : null}}>
                                        Rajasthan
                                    </option>
                                    <option
                                        value="sk" {{ $user->StudentProfile->state == 'sk' ? 'selected' : null}}>
                                        Sikkim
                                    </option>
                                    <option
                                        value="tn" {{ $user->StudentProfile->state == 'tn' ? 'selected' : null}}>
                                        Tamil Nadu
                                    </option>
                                    <option
                                        value="ts" {{ $user->StudentProfile->state == 'ts' ? 'selected' : null}}>
                                        Telangana
                                    </option>
                                    <option
                                        value="tr" {{ $user->StudentProfile->state == 'tr' ? 'selected' : null}}>
                                        Tripura
                                    </option>
                                    <option
                                        value="up" {{ $user->StudentProfile->state == 'up' ? 'selected' : null}}>
                                        Uttar Pradesh
                                    </option>
                                    <option
                                        value="uk" {{ $user->StudentProfile->state == 'uk' ? 'selected' : null}}>
                                        Uttrakhand
                                    </option>
                                    <option
                                        value="wb" {{ $user->StudentProfile->state == 'wb' ? 'selected' : null}}>
                                        West Bengal
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pincode" class="col-md-4 col-form-label text-md-right">PIN Code</label>

                            <div class="col-md-6">
                                <input id="pincode" type="number"
                                       class="form-control @error('pincode') is-invalid @enderror"
                                       name="pincode"
                                       value="{{ $user->StudentProfile->pincode }}" readonly required
                                       autocomplete="pincode"
                                       placeholder="pincode" autofocus>
                                <h6 style="color: red;padding-top: 10px;">{{ $user->StudentProfile->pincode ? "" : "Please Fill Your Pincode" }}</h6>
                                <p style="display: none;">{{ $user->StudentProfile->pincode ? '' : $disable_submit_btn = 1 }}</p>

                                @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="education-wrapper">
                        <hr/>
                        <h4>Education</h4>

                        <div class="form-group row">
                            <label for="degree" class="col-md-4 col-form-label text-md-right">Pass Out
                                Degree</label>

                            <div class="col-md-6">
                                <select class="form-control" disabled name="degree" id="degree" required>
                                    <option value="0" disabled selected>Select Your Highest Education</option>
                                    <option {{ $user_edu->in_college ? "" : "selected" }}>10/12th Std</option>
                                    <option {{ $user_edu->in_college ? "selected":"" }}>Diploma/Regular</option>
                                </select>

                                @error('degree')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marks"
                                   class="col-md-4 col-form-label text-md-right">Marks/Percentage</label>
                            <div class="col-md-6">
                                <input id="marks" type="number" min="1" max="100"
                                       class="form-control @error('marks') is-invalid @enderror" name="marks"
                                       value="{{ $user_edu->in_college ? $user_edu->cgpa : $user_edu->percentage }}" readonly required
                                       autocomplete="marks"
                                       placeholder="Enter Marks" autofocus>
                                <h6 style="color: red;padding-top: 5px;">{{ $user_edu->cgpa  ? "" : "Please Fill Your Marks"}}</h6>
                                @error('marks')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="{{ $user_edu->in_college ? '': 'display: none'}}">
                            <label for="department"
                                   class="col-md-4 col-form-label text-md-right">Department</label>
                            <div class="col-md-6">
                                <input class="form-control" readonly value="{{$dept_name}}">
                                @error('department')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="{{ $user_edu->in_college ? '': 'display: none'}}"    >
                            <label for="sem" class="col-md-4 col-form-label text-md-right">Semester</label>
                            <div class="col-md-6">
                                <input class="form-control" value="{{ $user_edu->current_sem }}" readonly>

                                @error('sem')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 pt-4">
                    <form action="/student/apply" method="POST">
                        @csrf
                        <div class="basic-details-wrapper">
                            <h4>Fill Out All details</h4>
                            <hr/>
                            <h4>Guardian Details</h4>

                            <div class="form-group row">
                                <label for="guard_name" class="col-md-4 col-form-label text-md-right">Guardian
                                    Name</label>

                                <div class="col-md-6">
                                    <input id="guard_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="guard_name"
                                           required autocomplete="first_name"
                                           placeholder="Guardian Name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guard_email" class="col-md-4 col-form-label text-md-right">Guardian
                                    Email</label>

                                <div class="col-md-6">
                                    <input id="guard_email" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="guard_email"
                                           required autocomplete="email"
                                           placeholder="Guardian Email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guard_number" class="col-md-4 col-form-label text-md-right">Contact
                                    Number</label>

                                <div class="col-md-6">
                                    <input id="guard_number" type="text"
                                           class="form-control @error('number') is-invalid @enderror"
                                           name="guard_number"
                                           required autocomplete="number"
                                           placeholder=" Guardian Number" autofocus>

                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="preference-wrapper">
                            <hr/>
                            <h4>Preferences</h4>

                            <div class="form-group row">
                                <label for=term" class="col-md-4 col-form-label text-md-right">Select Semester<br/><p>(Applying for)</p></label>
                                <div class="col-md-6">
                                    <select class="form-control" name="term" id="term">
                                        <option value="-1" selected disabled>Select Semester (Applying for)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6" >6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                            @error('term')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            {{ $roomDetails }}
                            <div class="form-group row">
                                <label for="room_type" class="col-md-4 col-form-label text-md-right">Room Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" required name="room_type" id="room_type">
                                        <option value="0" selected disabled>Select Type</option>
                                        @foreach($roomDetails as $room)
                                            <option value="{{$room->room_type}}">{{ $room->room_type }} Sharing
                                                -- {{ $room->price }} INR
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ac" class="col-md-4 col-form-label text-md-right">Room With:</label>
                                <div class="col-md-6 ac">
                                    <input type="radio" class="ac" name="ac" id="ac_on" required value="1"><label>With
                                        A.C.</label>
                                    <input type="radio" class="ac" name="ac" id="ac_off" required value="0"><label>Non
                                        A.C.</label>
                                    <span><p>1500 INR More for A.C. rooms</p></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mess_food" class="col-md-4 col-form-label text-md-right">Food in
                                    Mess:</label>
                                <div class="col-md-6 mess_food">
                                    <input type="radio" class="mess_food" name="food" required value="1"><label>With
                                        Food</label>
                                    <input type="radio" class="mess_food" name="food" required value="0"><label>Without
                                        Food</label>
                                    <span><p>2500 INR More for Food</p></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sub_total" class="col-md-4 col-form-label text-md-right">
                                    Sub Total</label>

                                <div class="col-md-6">
                                    <input id="sub_total" type="text"
                                           class="form-control @error('sub_total') is-invalid @enderror"
                                           name="sub_total"
                                           required value=""
                                           readonly autofocus>

                                    @error('sub_total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="duration" id="duration">
                                        <option value="1">1 Month</option>
                                        <option value="2">2 Months</option>
                                        <option value="3">3 Months</option>
                                        <option value="4">4 Months</option>
                                        <option value="5">5 Months</option>
                                        <option value="6" selected>6 Months</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="total" class="col-md-4 col-form-label text-md-right">
                                    Total Price</label>

                                <div class="col-md-6">
                                    <input id="total" type="text"
                                           class="form-control @error('total') is-invalid @enderror" name="total"
                                           required value=""
                                           readonly autofocus>

                                    @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <button class="btn btn-success m-3" id="onApply" type="submit" {{ $disable_submit_btn ? "disabled" : "" }}>Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                window.onload = function () {
                    $('#duration').blur(function () {
                        var total = 0;
                        var data = $('#room_type :selected').text();
                        var arr = data.trim().split(' ');
                        if (arr.length > 3) {
                            data = parseInt(arr[arr.length - 2]);
                            total = parseInt(total + data);
                            if ($('.ac').is(':checked')) {
                                if ($('.ac:checked').val() == '1') {
                                    total = parseInt(total + 1500);
                                }
                                if ($('.mess_food').is(':checked')) {
                                    if ($('.mess_food:checked').val() == '1') {
                                        total = parseInt(total + 2500);
                                    }
                                    $('#sub_total').val(total);
                                } else {
                                    swal({
                                        title: "Error!",
                                        text: "Please Select Food or Without Food",
                                        icon: "warning",
                                        button: "Aww yiss!",
                                    });
                                }

                            } else {
                                swal({
                                    title: "Error!",
                                    text: "Please Select AC Or Non AC",
                                    icon: "warning",
                                    button: "Aww yiss!",
                                });
                            }

                        } else {
                            swal({
                                title: "Error!",
                                text: "Please Select Room Type",
                                icon: "warning",
                                button: "Aww yiss!",
                            });
                        }
                        sub_total = parseInt($('#sub_total').val());
                        if (sub_total > 0) {
                            month = parseInt($(this).val());
                            total = parseInt(sub_total * month);
                            $('#total').val(total);
                        }
                    });
                }
            </script>
        </div>
    @else
        <script>window.location.href = '/unauth'</script>
    @endif
@endsection
