@extends('layouts.app')

@section('content')
    
    <a href="/api/email">Send Notif</a>
    <div class="album py-5 bg-light">
        <div class="row">
            @foreach ($packages as $package)
            <div class="col-md-4">
            <a class="nav-link" href="/listing/{{ $package->id }}">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="/storage/listing_images/{{ $package->image }}" alt="Card image cap">
                    <div class="card-body" style="color:black;">
                        <h4 class="card-text">{{ $package->description }}</h4>
                        <p class="card-text">Price: ${{ $package->price }}</p>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

@endsection