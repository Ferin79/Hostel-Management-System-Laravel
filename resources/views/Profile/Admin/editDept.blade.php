<link rel="stylesheet" href="{{ asset('css/Admin.editDept.css') }}">
<script src="{{ asset('js/Admin.editDept.js') }}"></script>
@extends('layouts.app')

@section('main_content_sidebar')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->email == $admin)
        <h1 class="d-flex justify-content-center align-items-center p-3">Manage & Edit Department</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12" style="border-right: 1px solid black">
                    <h3 class="mt-3">Edit Institutions</h3>
                    <form method="POST" class="add_institute mt-5">
                        @csrf
                        <label for="institute" class="col-form-label">Enter Institute</label>
                        <input class="form-control col-md-4" id="institute" type="text"
                               class="form-control" name="institute"
                               required autofocus>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <button class="btn btn-success mt-3" type="submit">Add Institute</button>
                    </form>
                    <hr/>
                    <form action="#" method="POST" id="delete_institute">
                        @csrf
                        <label class="col-form-label">Institution</label>
                        <select class="form-control col-md-4 record" id="record" name="record">

                        </select>
                        <button class="btn btn-danger mt-5" type="submit">Delete Selected Institution</button>
                    </form>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h3 class="mt-3">Edit Courses</h3>

                    <label class="col-form-label">Select Institution</label>
                    <select class="form-control col-md-4 record select_institution" name="record">

                    </select>
                    <div class="d-flex align-items-center">
                        <div class="col-md-6">
                            <table class="table mt-3">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Department in <span class="display_institute_name"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="course_added_area">

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <form action="#" method="post" id="add_department">
                                <label class="col-form-label">Enter Department Name To be Added in <span
                                        class="display_institute_name"
                                        style="font-weight: bold;text-transform: uppercase"></span> Branch</label>
                                <input class="form-control" placeholder="Enter Department Name" type="text">
                                <button class="btn btn-success mt-3" type="submit">Add Department</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
