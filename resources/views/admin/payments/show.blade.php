@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container">

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ $payment->No_of_packages }}</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $package->id }} / Name</h6>
                            <small class="text-muted">{{ substr($package->description, 0, 25) }} ...</small>
                        </div>
                        <span class="text-muted">${{ $package->price }}</span>
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
                        <span>Total (USD)</span>
                        <strong>${{ $package->price * $payment->No_of_packages }}</strong>
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
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="{{ $customer->first_name }}" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="{{ $customer->last_name }}" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 input-group-lg">
                            <label for="SSN">Social Security Number</label>
                            <input type="text" class="form-control" id="SSN" placeholder="Social Security Number" value="{{ $customer->SSN }}">
                            <div class="invalid-feedback">
                                Please provide a valid social security number.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" placeholder="Age" value="{{ $customer->age }}">
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" placeholder="Date of Bith" required value="{{ $customer->date_of_birth }}">
                            <div class="invalid-feedback">
                                Please provide a valid Date of Birth.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telephone">Telephone</label>
                            <input type="tel" class="form-control" id="telephone" placeholder="Telephone" value="{{ $customer->telephone }}">
                            <div class="invalid-feedback">
                                Please provide a valid telephone number.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" value="{{ $customer->email }}">
                            <div class="invalid-feedback">
                                Please enter a valid email address for billing updates.
                            </div>
                        </div>
                    </div>
                            
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="occupation">Occupation</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="{{ $customer->occupation }}" required>
                            <div class="invalid-feedback">
                                Please enter your Occupation.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="{{ $customer->address_line_1 }}" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" value="{{ $customer->address_line_2 }}">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="state">City/State</label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" value="{{ $customer->address_line_2 }}">
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Postal Code/Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" value="{{ $customer->postal_code }}" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                        <div class="col-md-5 input-group-lg">
                            <label for="country">Country Code</label>
                            <select class="custom-select d-block w-100" id="country" required>
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
                        <div class="col-md-6 mb-3">
                            <a href="" class="btn btn-primary">
                                <i class="fab fa-paypal"></i>
                                PayPal
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="" class="btn btn-primary">
                                <i class="fas fa-money-bill-wave"></i>
                                MoMO
                            </a>
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
                    
                </form>
            </div>
        </div>
    </div>
              







    

    <div class="row">

            <div class="card-body">

                <h5 class="card-header">payment id: </h5>
                <div class="col-sm-7">
                    <h5 class="card-title">payment details:</h5>
                    <h5>Customer info:</h5>
                    <div class="row">
                        <div class="col">First Name: {{ $customer->first_name }} </div>
                        <div class="col">Last Name: {{ $customer->last_name }}</div>

                        <div class="w-100"></div>
                        <div class="col">Tel: {{ $customer->telephone }} </div>
                        <div class="col"> Email: {{ $customer->email }} </div>
                    </div>
                    <br>
                    <h5>Listing info:</h5>
                    <div class="row">
                        <div class="col">Price: {{ $package->price }}</div>
                        <div class="col">Status:
                            @if ($package->status = 1)
                                Occupied
                            @else
                                Free
                            @endif
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            For: {{ date_diff(date_create($payment->from), date_create($payment->to))->format("%a days") }}
                        </div>
                        <div class="col"> From: {{ $payment->from }} </div>
                            <div class="col"> To: {{ $payment->to }} </div>
                    </div>

                    <h6 class="hidden-sm-down">Shrink page width to see sidebar collapse</h6>
                    <p>{{ $package->description }}</p>

                </div>
                
                <div class="col-sm-5">
                        <div class="card">
                        <div class="card-body">

                            @if ( $payment->method == 'MoMo')
                                <form id="formmomo" method="GET" action="https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml" target="_top">
                                    <input name="idbouton" value="2" autocomplete="off" type="hidden">
                                    <input name="typebouton" value="PAIE" autocomplete="off" type="hidden">
                                    <input class="momo mount" placeholder="" name="_amount" value="1" id="montant" autocomplete="off" type="hidden">
                                    <input class="momo host" placeholder="" name="_tel" value="652741226" autocomplete="off" type="hidden">
                                    <input class="momo pwd" placeholder="" name="_clP" value="" autocomplete="off" type="hidden">
                                    <input name="_email" value="kaze.nasser@outlook.com" autocomplete="off" type="hidden">
                                    <input id="Button_Image" src="https://developer.mtn.cm/OnlineMomoWeb/console/uses/itg_img/buttons/MOMO_Checkout_EN.jpg" style="width : 250px; height: 100px;" name="submit" alt="OnloneMomo, le réflexe sécurité pour payer en ligne" autocomplete="off" type="image" border="0">
                                </form>
                            @else
                                <form id="invoiceDetails" me>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="street" id="street" value="Malingo">
                                    <input type="hidden" name="city" id="city" value="Buea">
                                    <input type="hidden" name="state" id="state" value="South West">
                                    <input type="hidden" name="postal_code" id="postal_code" value="6534">
                                    <input type="hidden" name="country_code" id="country_code" value="CM">
                                    <input type="hidden" name="email" id="email" value="{{ $customer->email }}">
                                    <input type="hidden" name="first_name" id="first_name" value="{{ $customer->first_name }}">
                                    <input type="hidden" name="last_name" id="last_name" value="{{ $customer->last_name }}">
                                    <input type="hidden" name="room" id="room" value="">
                                    <input type="hidden" name="quantity" id="quantity" value="{{ $payment->No_of_rooms }}">
                                    <input type="hidden" name="price" id="price" value="{{ $package->price }}">
                                    <input type="submit" class="btn btn-primary invoice" style="color:aliceblue;" id="sendInvoice" value="Send Invoice">
                                    <a class="btn btn-danger" style="color:aliceblue; //display:none;" id="cancelInvoice">Cancel Invoice</a>
                                </form>
                            @endif
                            

                            

                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="/api/momo" class="btn btn-secondary" style="color:aliceblue; //display:none;" id="momo"> MoMo</a>



                            <script type="text/javascript">


                                $(document).ready( function () {



                                    $('#invoiceDetails').submit( function ( event ) {
                                        /*
                                        if ( $('.invoice').attr('id') == 'generateInvoice' ){
                                            $('#generateInvoice').val('Send Invoice');
                                            $('#generateInvoice').attr('id', 'sendInvoice');
                                            $('#cancelInvoice').toggle();
                                            var formdata = $(this).serializeFormJSON();
                                            console.log(typeof $(this).serializeFormJSON());
                                            $.ajax({
                                                type: "POST",
                                                url: "/paypal/generateInvoice",
                                                data: $(this).serializeFormJSON(),
                                            });
                                        }
                                        else {
                                            $.ajax({url:'/paypal/sendInvoice'});
                                            $('#sendInvoice').val('Generate Invoice');
                                            $('#sendInvoice').attr('id', 'generateInvoice');
                                            $('#cancelInvoice').toggle();
                                        }
                                            $('#cancelInvoice').click(function( event) {
                                            $.post('/paypal/cancelInvoice');
                                            $('#sendInvoice').val('Send Invoice');
                                            $('#sendInvoice').attr('id', 'generateInvoice');
                                            $('#cancelInvoice').toggle();
                                            event.preventDefault();
                                        });
                                        */

                                        var formdata = $(this).serializeFormJSON();
                                        console.log(typeof $(this).serializeFormJSON());
                                        $.ajax({
                                            type: "POST",
                                            url: "/paypal/sendInvoice",
                                            data: $(this).serializeFormJSON(),
                                        });
                                        event.preventDefault();
                                    });

                                    $('#cancelInvoice').click(function( event ) {
                                        $.post('/paypal/cancelInvoice');
                                        event.preventDefault();
                                    });

                                });
                                var email = '<?php echo $customer->email; ?>';
                            </script>





                        </div>
                        </div>
                    </div>
                </div>



        </div>

@endsection
