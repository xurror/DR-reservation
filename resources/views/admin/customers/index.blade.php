@extends('layouts.app')

@section('content')

    <h2>
        {{ __('Customers') }}
        <a href="/admin/customers/create" class="btn btn-outline-success fas fa-plus"></a>
    </h2>
    
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">SSN</th>
                    <th scope="col">Age</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Addr Line 1</th>
                    <th scope="col">Addr Line 2</th>
                    <th scope="col">City</th>
                    <th scope="col">Pstl Code</th>
                    <th scope="col">Ctry Code</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            @if (count($customers) > 0)
            @foreach ($customers as $customer)
            <form action="/admin/customers/{{ $customer->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <tbody>
                    <tr>
                        <th>
                            <a href="" data-toggle="modal" data-target="#{{ $customer->id }}">
                                {{ $customer->id }}
                            </a>
                        </th>
                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
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
                            <a class="btn btn-outline-primary fas fa-edit" href="/admin/customers/{{ $customer->id }}/edit"></a>
                            |
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger fas fa-trash" data-toggle="modal" data-target="#delete{{ $customer->id }}"></button>
                        </td>

                    </tr>
                </tbody>

                <!-- Modal -->
                <div class="modal fade" id="delete{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $customer->id }}Title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="{{ $customer->id }}Title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete customer {{ $customer->id }}
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
            <div class="modal fade" id="{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <a href="/admin/customers/{{ $customer->id }}/edit" class="btn btn-primary">Details</a>
                            &ensp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <p>No customers</p>
            @endif
        </table>
        {{ $customers->links() }}
    </div>    

@endsection
