@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">{{ __($package->description) }}</h4>
            <p>{{ __('Priciing: $'. $package->price . '/mo') }}</p>
            <div class="row">
                <div class="col-auto">
                    <button type="button" class="btn btn-primary fab fa-paypal" data-toggle="modal" data-target="#exampleModal" data-whatever="PayPal"> {{ __(' Send PayPal Request') }}</button>                    
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-warning fas fa-money-bill-wave" data-toggle="modal" data-target="#exampleModal" data-whatever="MoMo">{{ __(' Send MoMo Request') }}</button>
                </div>
                <a href="{{ url('/listing/reservation/'. $package->id) }}" class="btn" style="background:purple; color:aliceblue">{{ __('Make a reservation') }}</a>
            </div>
        </div>
        <div class="col-md-7 order-md-1">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url('/storage/listing_images/' . $package->image) }}" alt="Card image cap" class="d-block w-100">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ __('Previous') }}</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ __('Next') }}</span>
                </a>
            </div>
        </div>
    </div>

    
    
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var request = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New ' + request + ' request')
            modal.find('#method').val(request)
        })
        
    });
    </script>
@endsection