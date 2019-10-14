@extends('layouts.app')

@section('content')

    <h2>
        {{ __('Payments') }}
        <a href="/admin/payments/create" class="btn btn-outline-success fas fa-plus"></a>
    </h2>
    
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Method</th>
                    <th scope="col">Reservation ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            @if (count($payments) > 0)
            @foreach ($payments as $payment)
                <tbody>
                    <tr>
                        <th>
                            <a  href="" data-toggle="modal" data-target="#{{ $payment->id }}">{{ $payment->id }}</a>
                        </th>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->method }}</td>
                        <td>{{ $payment->reservation_id }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>
                            <a href="/admin/payments/{{ $payment->id }}/edit" class="btn btn-outline-primary fas fa-edit"></a>
                            |
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger fas fa-trash" data-toggle="modal" data-target="#delete{{ $payment->id }}"></button>
                        </td>

                    </tr>
                </tbody>

                <!-- Modal -->
                <div class="modal fade" id="delete{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $payment->id }}Title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="{{ $payment->id }}Title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete payment {{ $payment->id }}
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
            <div class="modal fade" id="{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $payment->id }}Title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="card-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="{{ $payment->id }}Title">{{ $payment->id }}</h4>
                        </div>
                        <div class="modal-body">
                            <p><big><label>Amount:</label>&ensp; {{ $payment->amount }}</big></p>
                            <p><big><label>Method:</label>&ensp; {{ $payment->method }}</big></p>
                            <p><big><label>Reservation ID:</label>&ensp; {{ $payment->reservation_id }}</big></p>
                            <p><big><label>Date:</label>&ensp; {{ $payment->date }}</big></p>
                        </div>
                        <div class="modal-footer">
                            <a href="/admin/payments/{{ $payment->id }}" class="btn btn-primary">Details</a>
                            &ensp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <p>No payments</p>
            @endif
        </table>
        {{ $payments->links() }}
    </div>    

@endsection
