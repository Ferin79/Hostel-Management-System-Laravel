<link href="{{ asset('css/Admin.EditSeatMatrix.css') }}" rel="stylesheet">
<script src="{{ asset('js/Admin.EditSeatMatrix.js') }}"></script>
@extends('layouts.app')

@section('main_content_sidebar')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->email == $admin)
        <h1 class="d-flex justify-content-center align-items-center p-3">Edit Seat Matrix</h1>
        <div class="container">
            <div class="row">
                <div class="col col-md-12">
                    <form method="POST" class="seat_wrapper" action="#">
                        @csrf
                        <input type="hidden" value="{{ csrf_token() }}" name="token" id="token">
                        <div class="form-group">
                            <label class="col-form-label">Select Institution</label>
                            <select class="form-control col-md-12 add_institution">

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Select Department</label>
                            <select class="form-control col-md-12 add_department">
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Select Year</label>
                            <select class="form-control col-md-12 add_year">
                                <option value="-1" selected disabled>Select Term</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Select Category</label>
                            <select class="form-control col-md-12 add_cast">
                                <option value="0" selected disabled>Select Category</option>
                                <option value="gen">General</option>
                                <option value="obc">OBC</option>
                                <option value="sc">SC</option>
                                <option value="st">ST</option>
                                <option value="oth">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Enter Boys Seats</label>
                            <input type="number" placeholder="Boys Seats" class="form-control" id="boys_seats"
                                   name="boys_seats"/>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Enter Girls Seats</label>
                            <input type="number" placeholder="Girls Seats" class="form-control" id="girls_seats"
                                   name="girls_seats"/>
                        </div>
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-12 pt-5 show_matrix_wrapper">
                    <div class="option_wrapper">
                        <input type="search" class="form-control col-md-3 col-sm-12 m-3" style="padding-left: 20px;"
                               placeholder="Search Seat Matrix ........." name="search_table" id="search_table"/>
                        <div class="col-3 col-md-3 col-sm-12 form-group">
                            <label class="col-form-label">Sort By:</label>
                            <select class="form-control">
                                <option value="-1" selected>Default</option>
                                <option value="1">Department-wise</option>
                                <option value="2">Institution-wise</option>
                            </select>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Institution Name</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Boys Seats</th>
                            <th scope="col">Girls Seats</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="add_list_here">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
