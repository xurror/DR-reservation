@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
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
        <a href="/reservations/create" style="color:green;">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h5>

    @if (count($reservations) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Reservation Date</th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">No of Rooms</th>
                    </tr>
                </thead>
                @foreach ($reservations as $reservation)
                <tbody>
                        <tr>
                            <th scope="row">{{ $reservation->id }}</th>
                            <td><a href="" data-toggle="modal" data-target="#{{ $reservation->id }}">
                                    {{ $reservation->reservation_date }}
                                </a>
                            </td>
                            <td>{{ $reservation->expiry_date }}</td>
                            <td>{{ $reservation->status }}</td>
                            <td>{{ $reservation->No_of_rooms }}</td>
                            <td>
                                <a href="/reservations/{{ $reservation->id }}/edit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                &ensp; | &ensp;                            
                                <a href="/reservations/{{ $reservation->id }}/edit" style="color:red;">
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                </a>
                            </td>

                        </tr>
                    </tbody>

                    <!-- Modal -->
                    <div class="modal fade" id="{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="exampleModalCenterTitle">{{ $reservation->reservation_date }}</h1>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><big><label>Name:</label>&ensp; {{ $reservation->reservation_date }}</big></p>
                                    <p><big><label>SSN:</label>&ensp; {{ $reservation->expiry_date }}</big></p>
                                    <p><big><label>:Age</label>&ensp; {{ $reservation->reservation_status }}</big></p>
                                    <p><big><label>Date of Birth:</label>&ensp; {{ $reservation->No_of_rooms }}</big></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="/reservations/{{ $reservation->id }}/edit">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
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
@endsection