@extends('layouts.app')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/rooms">Rooms</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$room->room_size}}</li>
        </ol>
    </nav>

    {!! Form::open(['action' => ['RoomsController@update', $room->id], 'method' => 'POST']) !!}
        <div class="form-group">

            {!! Form::label('room_size', 'Last Name') !!}
            {!! Form::text('room_size', $room->room_size, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}

            {!! Form::label('room_description', 'Description') !!}
            {!! Form::text('room_description', $room->room_description, ['class' => 'form-control', 'placeholder' => 'Social Security Number']) !!}

            {!! Form::label('room_price', 'Price') !!}
            {!! Form::text('room_price', $room->room_price, ['class' => 'form-control', 'placeholder' => 'Age']) !!}

            {!! Form::label('room_status', 'Status') !!}
            {!! Form::text('room_status', $room->room_status, ['class' => 'form-control', 'placeholder' => 'Date of Birth']) !!}
            
        </div>
        {!! Form::hidden('_method', 'PUT') !!}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection