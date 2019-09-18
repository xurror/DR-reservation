@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rooms</li>
        </ol>
    </nav>

    <style>
        .option1 {
            display: inline-block; /* show on the same line */
            padding-right: 5px; /* small gap on the right of each header */
        }
    </style>
    <h3 class="option1">Rooms</h3>
    <h5 class="option1">
        <a href="/rooms/create" style="color:green;">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h5>

    @if (count($rooms) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Size</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                @foreach ($rooms as $room)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $room->id }}</th>
                            <td><a href="" data-toggle="modal" data-target="#{{ $room->id }}">
                                    {{ $room->room_size }}
                                </a>
                            </td>
                            <td>{{ $room->room_description }}</td>
                            <td>{{ $room->room_price }}</td>
                            <td>{{ $room->room_status }}</td>

                            <td>
                                <a href="/rooms/{{ $room->id }}/edit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                &ensp; | &ensp;                            
                                <a href="/rooms/{{ $room->id }}/edit" style="color:red;">
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                </a>
                            </td>

                        </tr>
                    </tbody>



                    <!-- Modal -->
                    <div class="modal fade" id="{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="exampleModalCenterTitle">{{ $room->room_size }}</h1>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><big><label>Size:</label>&ensp; {{ $room->room_size }}</big></p>
                                    <p><big><label>Description:</label>&ensp; {{ $room->room_description }}</big></p>
                                    <p><big><label>Price:</label>&ensp; {{ $room->room_price }}</big></p>
                                    <p><big><label>Status:</label>&ensp; {{ $room->room_status }}</big></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="/rooms/{{ $room->id }}/edit">
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
        <p>No rooms</p>
    @endif
@endsection