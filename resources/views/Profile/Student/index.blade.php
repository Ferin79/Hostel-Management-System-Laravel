<link href="{{ asset('css/Student.index.css') }}" rel="stylesheet">
<script src="{{ asset('js/Student.index.js') }}"></script>
@extends('layouts.app')

@section('content')

    @if(!empty($errors))
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="userInfo">
                <img
                    src="/storage/{{ $user->StudentProfile->image ?? "" }}"
                    class="rounded-circle" alt="img">
                <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
            </div>
            <form class="profile-index-form" method="POST" action="/student/profile" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="col-lg-6 col-sm-12 profile-index-section-1">
                    <div class="basic-details-wrapper">
                        <hr/>
                        <h4>Basic Details</h4>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                       class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                       value="{{ $user->first_name }}" required autocomplete="first_name"
                                       readonly placeholder="First name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                       class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                       value="{{ $user->last_name }}" required autocomplete="last_name"
                                       readonly placeholder="Last name" autofocus>

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

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Contact Number</label>

                            <div class="col-md-6">
                                <input id="number" type="text"
                                       class="form-control @error('number') is-invalid @enderror" name="number"
                                       value="{{ $user->number }}" required autocomplete="number"
                                       readonly placeholder="number" autofocus>

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
                                       class="@error('gender') is-invalid @enderror" name="gender"
                                       value="male"
                                ><label>Male</label>

                                <input id="female" type="radio"
                                       {{ $user->StudentProfile->gender == 'female' ? 'checked' : null }}
                                       class="@error('gender') is-invalid @enderror" name="gender"
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
                                <select class="form-control" name="cast" id="cast">
                                    <option value="0" selected disabled>Select Cast</option>
                                    <option
                                        value="gen" {{ $user->StudentProfile->cast == 'gen' ? 'selected' : null }}>
                                        General
                                    </option>
                                    <option
                                        value="obc" {{ $user->StudentProfile->cast == 'obc' ? 'selected' : null }}>
                                        OBC
                                    </option>
                                    <option
                                        value="sc" {{ $user->StudentProfile->cast == 'sc' ? 'selected' : null }}>
                                        SC
                                    </option>
                                    <option
                                        value="st" {{ $user->StudentProfile->cast == 'st' ? 'selected' : null }}>
                                        ST
                                    </option>
                                    <option
                                        value="oth" {{ $user->StudentProfile->cast == 'oth' ? 'selected' : null }}>
                                        Other
                                    </option>
                                </select>

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
                                       value="{{ $user->StudentProfile->lane1 }}" required autocomplete="lane1"
                                       placeholder="lane1" autofocus>

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
                                       value="{{ $user->StudentProfile->lane2 }}" required autocomplete="lane2"
                                       placeholder="lane2" autofocus>

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
                                       value="{{ $user->StudentProfile->lane3 }}" autocomplete="lane3"
                                       placeholder="lane3" autofocus>

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
                                       value="{{ $user->StudentProfile->city }}" required autocomplete="city"
                                       placeholder="city" autofocus>

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
                                <select class="form-control" name="state" id="state" required>
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
                                       class="form-control @error('pincode') is-invalid @enderror" name="pincode"
                                       value="{{ $user->StudentProfile->pincode }}" required autocomplete="pincode"
                                       placeholder="pincode" autofocus>

                                @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 profile-index-section-2">
                    <div class="education-wrapper">
                        <hr/>
                        <h4>Education</h4>

                        <div class="form-group row">
                            <label for="degree" class="col-md-4 col-form-label text-md-right">Pass Out
                                Education or Currently Pursuing</label>

                            <div class="col-md-6">
                                <select class="form-control" name="degree" id="degree" required>
                                    <option value="-1" disabled selected>Select Your Passout Education</option>
                                    <option value="1" {{ $user_edu[0]->in_ssc_hsc == '1' ? 'selected' : null }}>10th or S.S.C</option>
                                    <option value="1" {{ $user_edu[0]->in_ssc_hsc == '1' ? 'selected' : null }}>12th or H.S.C</option>
                                    <option value="0" {{ $user_edu[0]->in_college == '1' ? 'selected' : null }}>Diploma / Regular</option>
                                </select>

                                @error('degree')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row marks_wrapper" style=St{{ $user_edu[0]->in_college ? "" : "display: none"}}>
                            <label for="marks" id="label_marks"
                                   class="col-md-4 col-form-label text-md-right">{{ $user_edu[0]->in_college ? 'Enter CGPA' : 'Enter Percentage' }}</label>
                            <div class="col-md-6">
                                <input id="marks" type="number" min="1" max="100"
                                       class="form-control @error('marks') is-invalid @enderror" name="marks"
                                       value="{{ $user_edu[0]->in_college ? $user_edu[0]->cgpa : $user_edu[0]->percentage }}" required autocomplete="marks"
                                       placeholder="{{ $user_edu[0]->in_college ? 'Enter CGPA' : 'Enter Percentage' }}" autofocus>

                                @error('marks')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row sem_wrapper" style="{{ $user_edu[0]->in_college ? '': 'display: none'}}">
                            <label for="sem" class="col-md-4 col-form-label text-md-right">Select Current
                                Semester</label>
                            <div class="col-md-6">
                                <select class="form-control" name="sem">
                                    <option value="-1" selected disabled>Select Current Semester</option>
                                    <option value="1" {{ $user_edu[0]->current_sem == '1' ? 'selected' : null }}>1</option>
                                    <option value="2" {{ $user_edu[0]->current_sem == '2' ? 'selected' : null }}>2</option>
                                    <option value="3" {{ $user_edu[0]->current_sem == '3' ? 'selected' : null }}>3</option>
                                    <option value="4" {{ $user_edu[0]->current_sem == '4' ? 'selected' : null }}>4</option>
                                    <option value="5" {{ $user_edu[0]->current_sem == '5' ? 'selected' : null }}>5</option>
                                    <option value="6" {{ $user_edu[0]->current_sem == '6' ? 'selected' : null }}>6</option>
                                    <option value="7" {{ $user_edu[0]->current_sem == '7' ? 'selected' : null }}>7</option>
                                    <option value="8" {{ $user_edu[0]->current_sem == '8' ? 'selected' : null }}>8</option>
                                </select>

                                @error('sem')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row institution_wrapper">
                            <label for="institution" class="col-md-4 col-form-label text-md-right">Select
                                Institution</label>
                            <div class="col-md-6">
                                <select class="form-control add_institute" name="institution" id="institution">
                                </select>

                                @error('institution')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row department_wrapper">
                            <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                            <div class="col-md-6">
                                <select class="form-control add_department" name="department" id="department">

                                </select>

                                @error('department')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="image-wrapper pt-5 mt-5">
                        <hr/>
                        <h4>Change Profile Image</h4>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                            <div class="col-md-6">
                                <input id="image" type="file"
                                       class="form-control @error('image') is-invalid @enderror " name="image"
                                       accept="image/*" autofocus>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="button-wrapper p-5 m-5">
                        <button class="btn btn-primary" id="profileBtn" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
