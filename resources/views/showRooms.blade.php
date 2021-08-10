<link href="{{ asset('css/showRooms.css') }}" rel="stylesheet"/>
@extends('layouts.app')

@section('content')
<a href="admin/add-room" class="btn btn-primary ml-5"
>Add New Rooms
</a>
<div class="container-fluid">
        <h1>Room List</h1>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Room Name</th>
                            <th scope="col">Price (INR head/Month)</th>                 
                            <th scope="col">room_number</th>
                            <th scope="col">gender</th>
                            {{-- <th scope="col">institution_id</th> --}}
                            {{-- <th scope="col">institution</th> --}}
                            {{-- <th scope="col">department_id</th> --}}
                            {{-- <th scope="col">department</th> --}}
                            {{-- <th scope="col">term</th> --}}
                            <th scope="col">capacity</th>
                            <th scope="col">assigned</th>
                            <th scope="col">is_ac</th>
                            <th scope="col">is_guest</th>
                            <th scope="col">is_alloted</th>
                        </tr>
                        </thead>
                        <tbody>
                        <p style="display: none;">{{ $len = 0 }}</p>
        @foreach($data as $value)
        <p style="display: none;">{{ $len++ }}</p>
        <tr>
            <th scope="row">{{$len}}</th>
            <td>{{ $value->room_type }} </td>
            <td> {{ $value->price }} </td>    
            <td>{{ $value->room_number }} </td>
            <td>{{ $value->gender }} </td>
            {{-- <td>{{ $value->institution_id }} </td>
            <td>{{ $value->institution->institute }} </td>
            <td>{{ $value->department_id }} </td>
            <td>{{ $value->department->department_name }} </td>
            <td>{{ $value->term }} </td> --}}
            <td>{{ $value->capacity }} </td>
            <td>{{ $value->assigned }} </td>
            <td>{{ $value->is_ac }} </td>
            <td>{{ $value->is_guest }} </td>
            <td>{{ $value->is_alloted }} </td>
        </tr>
                    
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
