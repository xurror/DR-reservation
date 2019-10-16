@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">{{ $package->description }}</h4>
            <p>Priciing: ${{ $package->price }}/mo</p>
            <div class="row">
                <div class="col-auto">
                    <button class="btn btn-primary fab fa-paypal"> Send PayPal Request</button>
                </div>
                <div class="col-auto">
                    <button class="btn bg-warning fas fa-money-bill-wave"> Send MoMo Request</button>
                </div>
            </div>
        </div>
        <div class="col-md-7 order-md-1">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/storage/listing_images/{{ $package->image }}" alt="Card image cap" class="d-block w-100">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
@endsection