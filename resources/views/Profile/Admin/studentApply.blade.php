<link href="{{ asset('css/Admin.EditSeatMatrix.css') }}" rel="stylesheet">
<script src="{{ asset('js/Admin.EditSeatMatrix.js') }}"></script>
@extends('layouts.app')

@section('main_content_sidebar')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->email == $admin)
        <h1 class="d-flex justify-content-center align-items-center p-3">Show Student Applied</h1>
        <div class="container">
            <div class="row">
                <div class="col col-md-12">
                    <form action="/admin/generate-seat-matrix" method="POST">
                        @csrf
                    <button class="btn btn-success mb-3">Generate Merit List</button>
                    </form>
                    <input type="search" class="form-control col-md-3 col-sm-12 m-3" style="padding-left: 20px;"
                               placeholder="Search Seat Matrix ........." name="search_table" id="search_table"/>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Percentage/CGPA</th>
                            <th scope="col">Department</th>
                            <th scope="col">Term</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Cast</th>
                        </tr>
                        </thead>
                        <tbody>
                        <p style="display: none;">{{ $len = 0 }}</p>
                        @foreach($data as $value)
                            <p style="display: none;">{{ $len++ }}</p>
                            <tr>
                                <th scope="row">{{$len}}</th>
                                <td>{{$value->user->first_name}}  {{ $value->user->last_name }}</td>
                                <td>{{$value->user->email}}</td>
                                <td>{{$value->user->StudentEducation->cgpa == '-1' ? $value->user->StudentEducation->percentage : $value->user->StudentEducation->cgpa }}</td>
                                <td>{{ $value->user->StudentEducation->department->department_name }}</td>
                                <td>{{ $value->term }}</td>
                                <td>{{ $value->user->studentprofile->gender }}</td>
                                <td>{{ $value->user->studentprofile->cast }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
