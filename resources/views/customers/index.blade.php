@extends('layouts.app')
@section('content')
    <h1>Customers</h1>   
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
                    <tbody>
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            <td>{{ $customer->SSN }}</td>
                            <td>{{ $customer->age }}</td>
                            <td>{{ $customer->date_of_birth }}</td>
                            <td>{{ $customer->occupation }}</td>
                            <td>{{ $customer->current_address }}</td>
                            <td>{{ $customer->telephone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @else
        <p>No customers</p>
    @endif
@endsection
