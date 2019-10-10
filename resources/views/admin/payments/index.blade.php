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
                        <li class="nav-item"><a href="/admin/packages"><span class="glyphicon glyphicon-signal"></span> Packages</a></li>
                        <li class="nav-item"><a href="/admin/payments"><span class="glyphicon glyphicon-signal"></span> Payments</a></li>
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
                        {{ __('payments') }}
                        <a href="/admin/payments/create" type="button" class="btn btn-outline-success glyphicon glyphicon-plus"></a>
                    </div>


                    <div class="card-body">
                        @if (count($payments) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Method</th>
                                            <th scope="col">payment ID</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach ($payments as $payment)
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <a href="/admin/payments/{{ $payment->id }}">{{ $payment->id }}</a>
                                                </th>
                                                <td>{{ $payment->amount }}</td>
                                                <td>{{ $payment->method }}</td>
                                                <td>{{ $payment->reservation_id }}</td>
                                                <td>{{ $payment->date }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-outline-primary glyphicon glyphicon-pencil" href="/admin/payments/{{ $payment->id }}/edit"></a>
                                                    |
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-outline-danger glyphicon glyphicon-trash" data-toggle="modal" data-target="#delete{{ $payment->id }}"></button>
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

                                    @endforeach
                                </table>
                            </div>
                        @else
                            <p>No payments</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
