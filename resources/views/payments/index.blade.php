@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payments</li>
        </ol>
    </nav>

    <style>
        .option1 {
            display: inline-block; /* show on the same line */
            padding-right: 5px; /* small gap on the right of each header */
        }
    </style>
    <h3 class="option1">Payments</h3>
    <h5 class="option1">
        <a href="/payments/create" style="color:green;">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h5>

    @if (count($payments) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                @foreach ($payments as $payment)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $payment->id }}</th>
                            <td><a href="" data-toggle="modal" data-target="#{{ $payment->id }}">
                                    {{ $payment->amount }}
                                </a>
                            </td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>
                                <a href="/payments/{{ $payment->id }}/edit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                &ensp; | &ensp;                            
                                <a href="/payments/{{ $payment->id }}/edit" style="color:red;">
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                </a>
                            </td>

                        </tr>
                    </tbody>



                    <!-- Modal -->
                    <div class="modal fade" id="{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="exampleModalCenterTitle">{{ $payment->amount }}</h1>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><big><label>SSN:</label>&ensp; {{ $payment->amount }}</big></p>
                                    <p><big><label>:Age</label>&ensp; {{ $payment->payment_date }}</big></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="/payments/{{ $payment->id }}/edit">
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
        <p>No payments</p>
    @endif
@endsection