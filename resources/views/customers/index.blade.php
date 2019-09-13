@extends('layouts.app')
@section('content')

    <!--
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
    </nav>
    
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
    </nav>
    -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customers</li>
        </ol>
    </nav>

    <style>
        .option1 {
            display: inline-block; /* show on the same line */
            padding-right: 5px; /* small gap on the right of each header */
        }
    </style>
    <h3 class="option1">Customers</h3>
    <h5 class="option1">
        <a href="/customers/create" style="color:green;">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </h5>

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
                        <th scope="col">Current Address</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                @foreach ($customers as $customer)
                {!! Form::open(['action' => ['CustomersController@destroy', $customer->id], 'method' => 'POST', 'class' => 'form-control']) !!}
                    <tbody>
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td><a href="" data-toggle="modal" data-target="#{{ $customer->id }}">
                                    {{ $customer->first_name }} {{ $customer->last_name }}
                                </a>
                            </td>
                            <td>{{ $customer->SSN }}</td>
                            <td>{{ $customer->age }}</td>
                            <td>{{ $customer->date_of_birth }}</td>
                            <td>{{ $customer->occupation }}</td>
                            <td>{{ $customer->current_address }}</td>
                            <td>{{ $customer->telephone }}</td>
                            <td>{{ $customer->email }}</td>

                            <td>
                                <a href="/customers/{{ $customer->id }}/edit">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                &ensp; | &ensp;                            
                                
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::submit('', ['class' => 'glyphicon glyphicon-pencil', 'aria-hidden' => 'true']) !!}
                                
                            </td>

                        </tr>
                    </tbody>



                    <!-- Modal -->
                    <div class="modal fade" id="{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="exampleModalCenterTitle">{{ $customer->first_name }} {{ $customer->last_name }}</h1>
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
                                    <p><big><label>Current Address:</label>&ensp; {{ $customer->current_address }}</big></p>
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
                {!! Form::close() !!}
                @endforeach
            </table>
        </div>
    @else
        <p>No customers</p>
    @endif
@endsection
