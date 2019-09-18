@extends('layouts.app')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/reservations">reservations</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$reservation->reservation_date}}</li>
        </ol>
    </nav>


    {!! Form::open(['action' => ['ReservationsController@update', $reservation->id], 'method' => 'POST']) !!}
        <div class="form-group">

            {!! Form::label('reservation_date', 'Reservation Date') !!}
            {!! Form::text('reservation_date', $reservation->reservation_date, ['class' => 'form-control', 'placeholder' => 'Reservation Date']) !!}

            {!! Form::label('expiry_date', 'Expiry Date') !!}
            {!! Form::text('expiry_date', $reservation->expiry_date, ['class' => 'form-control', 'placeholder' => 'Expiry Date']) !!}

            {!! Form::label('status', 'Status') !!}
            {!! Form::text('status', $reservation->status, ['class' => 'form-control', 'placeholder' => 'Status']) !!}

            {!! Form::label('No_of_rooms', 'No of Rooms') !!}
            {!! Form::text('No_of_rooms', $reservation->No_of_rooms, ['class' => 'form-control', 'placeholder' => 'No of Rooms']) !!}

        </div>
        {!! Form::hidden('_method', 'PUT') !!}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}


@endsection