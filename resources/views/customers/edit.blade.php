@extends('layouts.app')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/customers">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$customer->first_name}}</li>
        </ol>
    </nav>


    {!! Form::open(['action' => ['CustomersController@update', $customer->id], 'method' => 'POST']) !!}
        <div class="form-group">

            {!! Form::label('first_name', 'First Name') !!}
            {!! Form::text('first_name', $customer->first_name, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}

            {!! Form::label('last_name', 'Last Name') !!}
            {!! Form::text('last_name', $customer->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}

            {!! Form::label('SSN', 'Social Security Number') !!}
            {!! Form::text('SSN', $customer->SSN, ['class' => 'form-control', 'placeholder' => 'Social Security Number']) !!}

            {!! Form::label('age', 'Age') !!}
            {!! Form::text('age', $customer->age, ['class' => 'form-control', 'placeholder' => 'Age']) !!}

            {!! Form::label('date_of_birth', 'Date of Birth') !!}
            {!! Form::text('date_of_birth', $customer->date_of_birth, ['class' => 'form-control', 'placeholder' => 'Date of Birth']) !!}

            {!! Form::label('occupation', 'Occupation') !!}
            {!! Form::text('occupation', $customer->occupation, ['class' => 'form-control', 'placeholder' => 'Occupation']) !!}

            {!! Form::label('current_address', 'Current Address') !!}
            {!! Form::text('current_address', $customer->current_address, ['class' => 'form-control', 'placeholder' => 'Current Address']) !!}

            {!! Form::label('telephone', 'Telephone') !!}
            {!! Form::text('telephone', $customer->telephone, ['class' => 'form-control', 'placeholder' => 'Telephone']) !!}

            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', $customer->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

        </div>
        {!! Form::hidden('_method', 'PUT') !!}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}


@endsection