@extends('layouts.listing')

@section('content')
<form method="POST" action="{{ url('/listing/reserve') }}" enctype="multipart/form-data">
@csrf
@method('POST')
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h2 class="text-center">{{ __('Your Info') }}</h2>
            
                <div class="form-group row">
                    <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                    <div class="col-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                    <div class="col-6">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="SSN" class="col-md-4 col-form-label text-md-right">{{ __('SSN') }}</label>

                    <div class="col-6">
                        <input id="SSN" type="text" class="form-control @error('SSN') is-invalid @enderror" name="SSN" value="{{ old('SSN') }}" required autocomplete="SSN" placeholder="Social Security Number">

                        @error('SSN')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                    <div class="col-6">
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" required autocomplete="age" placeholder="Age">

                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                    <div class="col-6">
                        <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus placeholder="Date of Birth">

                        @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Occupation') }}</label>

                    <div class="col-6">
                        <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" required autocomplete="occupation" autofocus placeholder="occupation">

                        @error('occupation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address_line_1" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 1') }}</label>

                    <div class="col-6">
                        <input id="address_line_1" type="text" class="form-control @error('address_line_1') is-invalid @enderror" name="address_line_1" value="{{ old('address_line_1') }}" required autocomplete="address_line_1" autofocus placeholder="Address Line 1">

                        @error('address_line_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address_line_2" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 2') }}</label>

                    <div class="col-6">
                        <input id="address_line_2" type="text" class="form-control @error('address_line_2') is-invalid @enderror" name="address_line_2" value="{{ old('address_line_2') }}" required autocomplete="address_line_2" autofocus placeholder="Address Line 2">

                        @error('address_line_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                    <div class="col-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="City">

                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label>

                    <div class="col-6">
                        <input id="postal_code" type="number" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code" autofocus placeholder="Postal Code">

                        @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                    <div class="col-6 input-group-lg">
                        <select id="country_code" class="custom-select @error('country_code') is-invalid @enderror" name="country_code" required autocomplete="country_code">
                            <option disable-selected>{{ __('Country') }}</option>
                            <p>{{ config('countries.codes.AD.name') }}</p>
                            @foreach ( config('countries.codes') as $code)
                                <option value="{{ $code['code'] }}">{{ $code['name'] }}</option>
                            @endforeach
                        </select>
                        @error('country_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                    <div class="col-6">
                        <input id="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus placeholder="Telephone">

                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                    <div class="col-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@email.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                
            
        </div>
        <br>
        <div class="col-sm-6 py-lg-5">
            <h2 class="text-center py-lg-5">{{ __('Reservation Detail') }}</h2>
            <div class="row">
                <div class="col-7">
                    <img class="card-img-top" src="{{ url('/storage/listing_images/' . $package->image) }}" alt="Card image cap">
                </div>
                <div class="col-4">
                    <h4>
                        {{ __('Reservation for:') }}
                    </h4>
                    <p>
                        {{ __($package->description) }}
                    </p>
                    <p>
                        {{ __('Price: ' . $package->price) }}
                    </p>
                </div>
            </div>
            

            <hr>
            <h4 class="text-center">{{ __('Reservation Period') }}</h4>
            <div class="form-group row justify-content-start">
                <div class="col-lg-6">
                    <div class="row">
                        <label for="from" class="col-md-2 col-form-label text-md-left">{{ __('From') }}</label>

                        <div class="col-lg-9">
                            <input id="from" type="date" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ old('from') }}" required autocomplete="from" autofocus>

                            @error('from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label for="to" class="col-md-2 col-form-label text-md-left">{{ __('To') }}</label>

                        <div class="col-lg-9">
                            <input id="to" type="date" class="form-control @error('to') is-invalid @enderror" name="to" value="{{ old('to') }}" required autocomplete="to">

                            @error('to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <h4 class="text-center">{{ __('Payment Method') }}</h4>
            <div class="form-group row justify-content-center">                
                <div class="col-sm-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="method1" name="method" class="custom-control-input" value="{{ __('PayPal') }}">
                        <label class="custom-control-label" for="method1">{{ __('PayPal') }}</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="method2" name="method" class="custom-control-input" value="{{ __('MoMo') }}">
                        <label class="custom-control-label" for="method2">{{ __('MoMo') }}</label>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="modal-footer">
        <a href="{{ url('/') }}" type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</a>
        <button type="submit" class="btn" style="background:purple; color:aliceblue">{{ __('Send request') }}</button>

    <input type="hidden" name="package_id" value="{{ $package->id }}">

</form>

@endsection