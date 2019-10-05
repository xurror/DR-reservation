@extends('layouts.app')

@section('content')

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/packages">Packages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Package</li>
        </ol>
    </nav>

    {!! Form::open(['action' => 'packagesController@store', 'method' => 'POST']) !!}
        <div class="form-group">

            {!! Form::label('package_size', 'Size') !!}
            {!! Form::text('package_size', '', ['class' => 'form-control', 'placeholder' => 'Size']) !!}

            {!! Form::label('package_description', 'Description') !!}
            {!! Form::text('package_description', '', ['class' => 'form-control', 'placeholder' => 'Description']) !!}

            {!! Form::label('package_price', 'Price') !!}
            {!! Form::text('package_price', '', ['class' => 'form-control', 'placeholder' => 'Price']) !!}

            {!! Form::label('package_status', 'Status') !!}
            {!! Form::text('package_status', '', ['class' => 'form-control', 'placeholder' => 'Status']) !!}

        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection
