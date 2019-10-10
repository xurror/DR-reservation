@extends('layouts.app')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/payments">payments</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$payment->amount}}</li>
        </ol>
    </nav>


    {!! Form::open(['action' => ['PaymentsController@update', $payment->id], 'method' => 'POST']) !!}
        <div class="form-group">

            {!! Form::label('first_name', 'First Name') !!}
            {!! Form::text('first_name', $payment->amount, ['class' => 'form-control', 'placeholder' => 'Amount']) !!}

            {!! Form::label('last_name', 'Last Name') !!}
            {!! Form::text('last_name', $payment->payment_date, ['class' => 'form-control', 'placeholder' => 'Date']) !!}

        </div>
        {!! Form::hidden('_method', 'PUT') !!}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection