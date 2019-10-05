@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-auto msb py-8" id="msb">
        <div class="container-fluid">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="navbar-header">
                    <div class="brand-wrapper">
                        <!-- Brand -->
                        <div class="brand-name-wrapper">
                            <a class="navbar-brand" href="#">
                                Digital Renter
                            </a>
                        </div>
                    </div>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item"><a href="/admin"><span class="glyphicon glyphicon-globe"></span> Dashboard</a></li>
                    <li class="nav-item"><a href="/admin/customers"><span class="glyphicon glyphicon-globe"></span> Customers</a></li>
                    <li class="nav-item"><a href="/admin/reservations"><span class="glyphicon glyphicon-signal"></span> Reservations</a></li>
                    <li class="nav-item"><a href="/admin/settings"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                    <li class="nav-item"><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-9">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">reservations</li>
                </ol>
            </nav>

            <style>
                .option1 {
                    display: inline-block; /* show on the same line */
                    padding-right: 5px; /* small gap on the right of each header */
                }
            </style>
            <h3 class="option1">reservations</h3>
            <h5 class="option1">
                <a href="/admin/reservations/create" type="button" class="btn btn-outline-success glyphicon glyphicon-plus"></a>
            </h5>

            @if (count($reservations) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Room ID</th>
                                <th scope="col">Reservation Date</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">No of Rooms</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        @foreach ($reservations as $reservation)
                        <form action="/admin/reservations/{{ $reservation->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $reservation->id }}</th>
                                    <td><a href="" data-toggle="modal" data-target="#{{ $reservation->first_name }}">
                                            {{ $reservation->first_name }} {{ $reservation->last_name }}
                                        </a>
                                    </td>
                                    <td>{{ $reservation->telephone }}</td>
                                    <td>{{ $reservation->email }}</td>
                                    <th>{{ $reservation->room_id }}</th>
                                    <td>{{ $reservation->reservation_date }}</td>
                                    <td>{{ $reservation->expiry_date }}</td>
                                    <td>{{ $reservation->status }}</td>
                                    <td>{{ $reservation->No_of_rooms }}</td>
                                    <td>
                                        <a type="button" class="btn btn-outline-primary glyphicon glyphicon-pencil" href="/admin/reservations/{{ $reservation->id }}/edit"></a>
                                        |
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger glyphicon glyphicon-trash" data-toggle="modal" data-target="#exampleModalCenter"></button>
                                    </td>

                                </tr>
                            </tbody>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure you want to delete this reservation
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </form>

                            <!-- Modal -->
                            <div class="modal fade" id="{{ $reservation->first_name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="exampleModalCenterTitle">{{ $reservation->id }}</h4>
                                        </div>
                                        <div class="modal-body">
                                                <p><big><label>Name:</label>&ensp; {{ $reservation->first_name }} {{ $reservation->last_name }}</big></p>
                                            <p><big><label>Telephone:</label>&ensp; {{ $reservation->telephone }}</big></p>
                                            <p><big><label>Email:</label> &ensp; {{ $reservation->email }}</big></p>
                                            <p><big><label>Room ID:</label>&ensp; {{ $reservation->room_id }}</big></p>
                                            <p><big><label>Reservation Date:</label>&ensp; {{ $reservation->reservation_date }}</big></p>
                                            <p><big><label>Expiry Date:</label>&ensp; {{ $reservation->expiry_date }}</big></p>
                                            <p><big><label>Status:</label>&ensp; {{ $reservation->status }}</big></p>
                                            <p><big><label>No of room:</label>&ensp; {{ $reservation->No_of_rooms }}</big></p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="/admin/reservations/{{ $reservation->id }}/edit" class="btn btn-primary">Details</a>
                                            &ensp;
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
            @else
                <p>No Reservations</p>
            @endif

        </div>
    </div>
</div>

@endsection


