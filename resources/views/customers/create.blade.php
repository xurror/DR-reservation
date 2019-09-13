@extends('layouts.app')

@section('content')

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/customers">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Customer</li>
        </ol>
    </nav>

    {!! Form::open(['action' => 'CustomersController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('first_name', 'First Name') !!}
            {!! Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name']) !!}

            {!! Form::label('last_name', 'Last Name') !!}
            {!! Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}

            {!! Form::label('SSN', 'Social Security Number') !!}
            {!! Form::text('SSN', '', ['class' => 'form-control', 'placeholder' => 'Social Security Number']) !!}

            {!! Form::label('age', 'Age') !!}
            {!! Form::text('age', '', ['class' => 'form-control', 'placeholder' => 'Age']) !!}

            {!! Form::label('date_of_birth', 'Date of Birth') !!}
            {!! Form::text('date_of_birth', '', ['class' => 'form-control', 'placeholder' => 'Date of Birth']) !!}

            {!! Form::label('occupation', 'Occupation') !!}
            {!! Form::text('occupation', '', ['class' => 'form-control', 'placeholder' => 'Occupation']) !!}

            {!! Form::label('current_address', 'Current Address') !!}
            {!! Form::text('current_address', '', ['class' => 'form-control', 'placeholder' => 'Current Address']) !!}

            {!! Form::label('telephone', 'Telephone') !!}
            {!! Form::text('telephone', '', ['class' => 'form-control', 'placeholder' => 'Telephone']) !!}

            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection