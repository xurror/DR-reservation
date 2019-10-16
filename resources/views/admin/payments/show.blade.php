@extends('layouts.app')

@section('content')

    <div class="container">            
        
        <form id="formpaypal" class="needs-validation"></form>
        <form id="formmomo"></form>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ $reservation->No_of_packages }}</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $package->id }} / Name</h6>
                            <small class="text-muted">{{ substr($package->description, 0, 25) }} ...</small>
                        </div>
                        <input type="number" class="form-control mx-sm-5" name="price" id="price" form="formpaypal" placeholder="" value="{{ $package->price }}" readonly>
                    </li>
                    
                    <!--- Iterate to Add More contents -->

                    <!--- Optional Promo Code -->
                    <!---
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    -->
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="mx-sm-3">Total (USD)</span>
                        <input type="number" class="form-control mx-sm-5" name="amount" id="amount" form="formpaypal" placeholder="" value="{{ $package->price * $reservation->No_of_packages }}" readonly>
                    </li>
                </ul>
                <!--
                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append py-1">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
                -->

            </div>
            
            <div class="col-md-8 order-md-1">

                <h4 class="mb-3">Billing address</h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" form="formpaypal" value="{{ $customer->first_name }}" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" form="formpaypal" value="{{ $customer->last_name }}" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 input-group-lg">
                        <label for="SSN">Social Security Number</label>
                        <input type="text" class="form-control" id="SSN" name="SSN" form="formpaypal" value="{{ $customer->SSN }}">
                        <div class="invalid-feedback">
                            Please provide a valid social security number.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" form="formpaypal" value="{{ $customer->age }}">
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" form="formpaypal" required value="{{ $customer->date_of_birth }}">
                        <div class="invalid-feedback">
                            Please provide a valid Date of Birth.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="telephone">Telephone</label>
                        <input type="tel" class="form-control" name="telephone" id="telephone" form="formpaypal" value="{{ $customer->telephone }}">                            
                        <div class="invalid-feedback">
                            Please provide a valid telephone number.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" form="formpaypal" value="{{ $customer->email }}">
                        <div class="invalid-feedback">
                            Please enter a valid email address for billing updates.
                        </div>
                    </div>
                </div>
                        
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="occupation">Occupation</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" form="formpaypal" value="{{ $customer->occupation }}" required>
                        <div class="invalid-feedback">
                            Please enter your Occupation.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" form="formpaypal" value="{{ $customer->address_line_1 }}" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2" form="formpaypal" placeholder="Apartment or suite" value="{{ $customer->address_line_2 }}">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="city">City/State</label>
                        <input type="text" class="form-control" id="city" name="city" form="formpaypal" value="{{ $customer->city }}">
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Postal Code/Zip</label>
                        <input type="tel" class="form-control" id="postalCode" name="postalCode" form="formpaypal" value="{{ $customer->postal_code }}" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                    <div class="col-md-5 input-group-lg">
                        <label for="country">Country Code</label>
                        <select class="custom-select d-block w-100" id="countryCode" name="countryCode" form="formpaypal" required>
                            <option disable-selected>{{ $customer->country_code }}</option>
                            @foreach ($countryCodes as $code => $country)
                                <option value="{{ $code }}">{{ $country }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">
    
                <h4 class="mb-3">Invoice</h4>
    
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-primary fab fa-paypal" id="paypalbutton" form="formpaypal" >
                            PayPal
                        </button>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="hidden" name="_amount" id="momoAmount" value="" id="montant" form="formmomo">
                        <input type="hidden" name="_tel" id="momoTelephone" value="" form="formmomo">
                        <button id="momobutton" name="submit" class="btn bg-warning fas fa-money-bill-wave" type="submit" form="formmomo">
                            MoMo
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                
                <hr class="mb-4">

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {

        $('#formmomo').submit( function ( event ) {
            var input_telephone = $('#telephone').val();
            $('#momoTelephone').val(input_telephone);
            
            if (input_telephone.length != 9){
                setTimeout(function(){
                    $('#alert-danger').fadeToggle("slow");
                }, 2500);
                $('#alert-danger').fadeToggle("slow");
            } 
            else {
                var input_amount = $('#amount').val();
                $('#momoAmount').val(input_amount);
                $.ajax({
                    type: "GET",
                    url: "/api/momo-invoice",
                    data: $(this).serializeFormJSON(),
                    success: function() {
                        setTimeout(function(){
                            $('#alert-success').fadeToggle("slow");
                        }, 2500);
                        $('#alert-success').fadeToggle("slow");
                    },
                    error: function() {
                        setTimeout(function(){
                            $('#alert-danger').fadeToggle("slow");
                        }, 2500);
                        $('#alert-danger').fadeToggle("slow");     
                    },
                    complete: function() {
                        setTimeout(function(){
                            $('#alert-info').fadeToggle("slow");
                        }, 2500);
                        $('#alert-info').fadeToggle("slow");
                    }
                });
            }
            event.preventDefault();
        });

        $('#formpaypal').submit( function ( event ) {
            var formdata = $(this).serializeFormJSON();
            console.log(typeof $(this).serializeFormJSON());
            $.ajax({
                type: "POST",
                url: "/api/paypal-invoice",
                data: formdata,
                success: function() {
                    setTimeout(function(){
                        $('#alert-success').fadeToggle("slow");
                    }, 2500);
                    $('#alert-success').fadeToggle("slow");
                },
                error: function() {
                    setTimeout(function(){
                        $('#alert-danger').fadeToggle("slow");
                    }, 2500);
                    $('#alert-danger').fadeToggle("slow");     
                },
                complete: function() {
                    setTimeout(function(){
                        $('#alert-info').fadeToggle("slow");
                    }, 2500);
                    $('#alert-info').fadeToggle("slow");
                }
            });
            event.preventDefault();
        });
    });
    </script>
            
    
@endsection
