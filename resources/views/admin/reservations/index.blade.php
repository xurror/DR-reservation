@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-auto msb bg-dark" id="msb">
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
            <div class="card">
                <div class="card-header">
                    {{ __('Reservations') }}
                    <a href="/admin/reservations/create" class="btn btn-outline-success glyphicon glyphicon-plus"></a>
                </div>


                <div class="card-body">
                    @if (count($reservations) > 0)
                        <div class="table-responsive-lg">
                            <table class="table table-bordered table-hover" style="overflow-y: hidden;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">PKG ID</th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"  style="width:  10%">No of PKGs</th>
                                        <th scope="col"  style="width:  10%">Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($reservations as $reservation)
                                <form action="/admin/reservations/{{ $reservation->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $reservation->id }}</th>
                                            <td><a href="" data-toggle="modal" data-target="#{{ $reservation->customer_id }}">
                                                    {{ $reservation->customer_id }}
                                                </a>
                                            </td>
                                            <th>{{ $reservation->package_id }}</th>
                                            <td>{{ $reservation->from }}</td>
                                            <td>{{ $reservation->to }}</td>
                                            <td>{{ $reservation->status }}</td>
                                            <td  style="width:  10%">{{ $reservation->No_of_packages }}</td>
                                            <td  style="width:  10%">
                                                <a class="btn btn-outline-primary glyphicon glyphicon-pencil" href="/admin/reservations/{{ $reservation->id }}/edit"></a>
                                                |
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-outline-danger glyphicon glyphicon-trash" data-toggle="modal" data-target="#{{ $reservation->id }}"></button>
                                            </td>

                                        </tr>
                                    </tbody>



                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $reservation->id }}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="{{ $reservation->id }}Title">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Are you sure you want to delete reservation {{ $reservation->id }}
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" {{ action('ReservationsController@destroy', ['id'=>$reservation->id]) }} class="btn btn-danger">Yes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                </form>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ $reservation->customer_id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $reservation->id }}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="card-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="{{ $reservation->id }}Title">{{ $reservation->id }}</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <p><big><label>Customer ID:</label>&ensp; {{ $reservation->customer_id }}</big></p>
                                                    <p><big><label>package ID:</label>&ensp; {{ $reservation->package_id }}</big></p>
                                                    <p><big><label>From:</label>&ensp; {{ $reservation->from }}</big></p>
                                                    <p><big><label>To:</label>&ensp; {{ $reservation->to }}</big></p>
                                                    <p><big><label>Status:</label>&ensp; {{ $reservation->status }}</big></p>
                                                    <p><big><label>No of PKGs:</label>&ensp; {{ $reservation->No_of_packages }}</big></p>
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
                            {{ $reservations->links() }}
                        </div>
                    @else
                        <p>No Reservations</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


