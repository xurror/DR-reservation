@extends('layouts.app')

@section('content')

    <h2>
        {{ __('Reservations') }}
        <a href="/admin/reservations/create" class="btn btn-outline-success fas fa-plus"></a>
    </h2>
        
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Package ID</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Status</th>
                    <th scope="col">No of Packages</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            @if (count($reservations) > 0)
            @foreach ($reservations as $reservation)
            <form action="/admin/reservations/{{ $reservation->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <tbody>
                    <tr>
                        <td>
                            <a href="" data-toggle="modal" data-target="#{{ $reservation->id }}">
                                {{ $reservation->id }}
                            </a>
                        </td>
                        <td>{{ $reservation->customer_id }}</td>
                        <th>{{ $reservation->package_id }}</th>
                        <td>{{ $reservation->from }}</td>
                        <td>{{ $reservation->to }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td  style="width:  10%">{{ $reservation->No_of_packages }}</td>
                        <td  style="width:  10%">
                            <a class="btn btn-outline-primary fas fa-edit" href="/admin/reservations/{{ $reservation->id }}/edit"></a>
                            |
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger fas fa-trash" data-toggle="modal" data-target="#delete{{ $reservation->id }}"></button>
                        </td>

                    </tr>
                </tbody>

                <!-- Modal -->
                <div class="modal fade" id="delete{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $reservation->id }}Title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="delete{{ $reservation->id }}Title">Confirmation</h5>
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
            <div class="modal fade" id="{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $reservation->id }}Title" aria-hidden="true">
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
            @else
                <p>No Reservations</p>
            @endif
        </table>
        {{ $reservations->links() }}
    </div>

@endsection


