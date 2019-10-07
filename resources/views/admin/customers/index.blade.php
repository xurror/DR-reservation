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
                    {{ __('Customers') }}
                    <a href="/admin/customers/create" type="button" class="btn btn-outline-success glyphicon glyphicon-plus"></a>
                </div>


                <div class="card-body">
                    @if (count($customers) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">SSN</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Occupation</th>
                                        <th scope="col">Address Line 1</th>
                                        <th scope="col">Address Line 2</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Postal Code</th>
                                        <th scope="col">Country Code</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($customers as $customer)
                                <form action="/admin/customers/{{ $customer->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $customer->id }}</th>
                                            <td><a href="" data-toggle="modal" data-target="#{{ $customer->first_name }}">
                                                    {{ $customer->first_name }} {{ $customer->last_name }}
                                                </a>
                                            </td>
                                            <td>{{ $customer->SSN }}</td>
                                            <td>{{ $customer->age }}</td>
                                            <td>{{ $customer->date_of_birth }}</td>
                                            <td>{{ $customer->occupation }}</td>
                                            <td>{{ $customer->address_line_1 }}</td>
                                            <td>{{ $customer->address_line_2 }}</td>
                                            <td>{{ $customer->city }}</td>
                                            <td>{{ $customer->postal_code }}</td>
                                            <td>{{ $customer->country_code }}</td>
                                            <td>{{ $customer->telephone }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>
                                                <a type="button" class="btn btn-outline-primary glyphicon glyphicon-pencil" href="/admin/customers/{{ $customer->id }}/edit"></a>
                                                |
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-outline-danger glyphicon glyphicon-trash" data-toggle="modal" data-target="#{{ $customer->id }}"></button>
                                            </td>

                                        </tr>
                                    </tbody>



                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $customer->id }}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="{{ $customer->id }}Title">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Are you sure you want to delete reservation {{ $customer->id }}
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
                                    <div class="modal fade" id="{{ $customer->first_name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ $customer->id }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><big><label>Name:</label>&ensp; {{ $customer->first_name }} {{ $customer->last_name }}</big></p>
                                                    <p><big><label>SSN:</label>&ensp; {{ $customer->SSN }}</big></p>
                                                    <p><big><label>:Age</label>&ensp; {{ $customer->age }}</big></p>
                                                    <p><big><label>Date of Birth:</label>&ensp; {{ $customer->date_of_birth }}</big></p>
                                                    <p><big><label>Occupation:</label>&ensp; {{ $customer->occupation }}</big></p>
                                                    <p><big><label>Address Line 1:</label>&ensp; {{ $customer->address_line_1 }}</big></p>
                                                    <p><big><label>Address Line 2:</label>&ensp; {{ $customer->address_line_2 }}</big></p>
                                                    <p><big><label>City:</label>&ensp; {{ $customer->city }}</big></p>
                                                    <p><big><label>Postal Code:</label>&ensp; {{ $customer->postal_code }}</big></p>
                                                    <p><big><label>Country Code:</label>&ensp; {{ $customer->country_code }}</big></p>
                                                    <p><big><label>Telephone:</label>&ensp; {{ $customer->telephone }}</big></p>
                                                    <p><big><label>Email:</label> &ensp; {{ $customer->email }}</big></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="/customers/{{ $customer->id }}/edit">
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
                        <p>No customers</p>
                    @endif
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
