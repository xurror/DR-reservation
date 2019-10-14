@extends('layouts.app')

@section('content')

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/payments">payments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add payment</li>
        </ol>
    </nav>

    {!! Form::open(['action' => 'PaymentsController@store', 'method' => 'POST']) !!}
        <div class="form-group">

            {!! Form::label('amount', 'Amount') !!}
            {!! Form::text('amount', '', ['class' => 'form-control', 'placeholder' => 'Amount']) !!}

            {!! Form::label('payment_date', 'Date') !!}
            {!! Form::text('payment_date', '', ['class' => 'form-control', 'placeholder' => 'Date']) !!}

        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection