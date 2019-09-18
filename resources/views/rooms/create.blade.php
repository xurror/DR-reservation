@extends('layouts.app')

@section('content')

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/rooms">Rooms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Room</li>
        </ol>
    </nav>

    {!! Form::open(['action' => 'RoomsController@store', 'method' => 'POST']) !!}
        <div class="form-group">

            {!! Form::label('room_size', 'Size') !!}
            {!! Form::text('room_size', '', ['class' => 'form-control', 'placeholder' => 'Size']) !!}

            {!! Form::label('room_description', 'Description') !!}
            {!! Form::text('room_description', '', ['class' => 'form-control', 'placeholder' => 'Description']) !!}

            {!! Form::label('room_price', 'Price') !!}
            {!! Form::text('room_price', '', ['class' => 'form-control', 'placeholder' => 'Price']) !!}

            {!! Form::label('room_status', 'Status') !!}
            {!! Form::text('room_status', '', ['class' => 'form-control', 'placeholder' => 'Status']) !!}
            
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection