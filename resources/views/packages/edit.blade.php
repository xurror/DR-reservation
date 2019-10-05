@extends('layouts.app')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/packages">Packages</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$package->package_size}}</li>
        </ol>
    </nav>

    {!! Form::open(['action' => ['packagesController@update', $package->id], 'method' => 'POST']) !!}
        <div class="form-group">

            {!! Form::label('package_size', 'Last Name') !!}
            {!! Form::text('package_size', $package->package_size, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}

            {!! Form::label('package_description', 'Description') !!}
            {!! Form::text('package_description', $package->package_description, ['class' => 'form-control', 'placeholder' => 'Social Security Number']) !!}

            {!! Form::label('package_price', 'Price') !!}
            {!! Form::text('package_price', $package->package_price, ['class' => 'form-control', 'placeholder' => 'Age']) !!}

            {!! Form::label('package_status', 'Status') !!}
            {!! Form::text('package_status', $package->package_status, ['class' => 'form-control', 'placeholder' => 'Date of Birth']) !!}

        </div>
        {!! Form::hidden('_method', 'PUT') !!}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection
