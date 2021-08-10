<link rel="stylesheet" href="{{asset("css/removeNavbar.css")}}">
@extends('layouts.app')

@section('main_content_sidebar')
    @php
        $admin = env('ADMIN');
    @endphp
    @if(Auth::user()->email == $admin)
        <h1 class="d-flex justify-content-center align-items-center p-3">Show Student Applied</h1>
        <div class="container">
            <form action="/admin/generate_master_seat_matrix" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-success">Generate Master Seat-Matrix</button>
            </form>
            <form action="/admin/allot_seats" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-success">Allot Seats</button>
            </form>
            <div class="row">
                <div class="col col-md-12">
                    <h1 class="text-center">In SSC/HSC</h1>
                    @foreach ($depts as $dept)
                        @if (App\StudentEducation::where('department_id', $dept->id)->count() > 0 &&
                             App\StudentEducation::where('department_id', $dept->id)->first()->in_ssc_hsc)


                            <h3 class="font-weight-bold">{{$dept->department_name}}</h3>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">room_type</th>
                                    <th scope="col">ac</th>
                                    <th scope="col">food</th>
                                    <th scope="col">duration</th>
                                    <th scope="col">total</th>
                                    <th scope="col">term</th>
                                    <th scope="col">gender</th>
                                    <th scope="col">cast</th>
                                </tr>
                                </thead>
                                <tbody>
                                <p style="display: none;">{{ $len = 0 }}</p>

                                @foreach($ssc_hsc as $item)
                                    @if ($dept->id == $item->department_id)


                                        <p style="display: none;">{{ $len++ }}</p>
                                        <tr>
                                            <th scope="row">{{$len}}</th>
                                            <td>{{$item->first_name}}  {{ $item->last_name }}</td>
                                            <td>{{$item->percentage}} </td>
                                            <td>{{$item->department_id}} </td>
                                            <td>{{$item->room_type}} </td>
                                            <td>{{$item->ac}} </td>
                                            <td>{{$item->food}} </td>
                                            <td>{{$item->duration}} </td>
                                            <td>{{$item->total}} </td>
                                            <td>{{$item->term}} </td>
                                            <td>{{$item->gender}} </td>
                                            <td>{{$item->cast}} </td>
                                        </tr>

                                    @endif
                                @endforeach


                                </tbody>
                            </table>
                        @endif
                    @endforeach


                    <h1 class="text-center mt-5 pt-5">In College</h1>
                    @foreach ($depts as $dept)
                        @if (App\StudentEducation::where('department_id', $dept->id)->count() > 0 &&
                             App\StudentEducation::where('department_id', $dept->id)->first()->in_college)
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">CGPA</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">room_type</th>
                                    <th scope="col">ac</th>
                                    <th scope="col">food</th>
                                    <th scope="col">duration</th>
                                    <th scope="col">total</th>
                                    <th scope="col">term</th>
                                    <th scope="col">gender</th>
                                    <th scope="col">cast</th>
                                </tr>
                                </thead>
                                <tbody>
                                <p style="display: none;">{{ $len = 0 }}</p>
                                @foreach($clg as $item)
                                    @if ($dept->id == $item->department_id)
                                        <p style="display: none;">{{ $len++ }}</p>
                                        <tr>
                                            <th scope="row">{{$len}}</th>
                                            <td>{{$item->first_name}}  {{ $item->last_name }}</td>
                                            <td>{{$item->cgpa}} </td>
                                            <td>{{$item->department_id}} </td>
                                            <td>{{$item->room_type}} </td>
                                            <td>{{$item->ac}} </td>
                                            <td>{{$item->food}} </td>
                                            <td>{{$item->duration}} </td>
                                            <td>{{$item->total}} </td>
                                            <td>{{$item->term}} </td>
                                            <td>{{$item->gender}} </td>
                                            <td>{{$item->cast}} </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endforeach
                    <br><br>
                    <h1>Merit List</h1>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">users_id</th>
                            <th scope="col">institution_id</th>
                            <th scope="col">department_id</th>
                            <th scope="col">in_ssc_hsc</th>
                            <th scope="col">in_college</th>
                            <th scope="col">cgpa</th>
                            <th scope="col">percentage</th>
                            <th scope="col">term</th>
                            <th scope="col">cast</th>
                            <th scope="col">gender</th>
                        </tr>
                        </thead>
                        <tbody>
                        <p style="display: none;">{{ $len = 0 }}</p>
                        @foreach($merit_list as $item)

                            <p style="display: none;">{{ $len++ }}</p>
                            <tr>
                                <th scope="row">{{$len}}</th>
                                <td>{{$item->user_id}} </td>
                                <td>{{$item->institution_id}} </td>
                                <td>{{$item->department_id}} </td>
                                <td>{{$item->in_ssc_hsc}} </td>
                                <td>{{$item->in_college}} </td>
                                <td>{{$item->cgpa == -1 ? "NA" : $item->cgpa}} </td>
                                <td>{{$item->percentage}} </td>
                                <td>{{$item->term}} </td>
                                <td>{{$item->cast}} </td>
                                <td>{{$item->gender}} </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <script>
            document.querySelector('#menu-toggle').addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector('#wrapper').classList.toggle('toggled');
            });
        </script>
    @else
        <script>window.location = "/unauth";</script>
    @endif
@endsection
