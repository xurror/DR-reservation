@extends('layouts.app')

@section('content')

    <div class="container">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/customers">customers</a></li>
                <li class="breadcrumb-item active" aria-current="page">edit customers</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Edit Customer</h5>
                        <h5 class="pull-right">{{ $customer->id }}</h5>
                    </div>

                    <div class="card-body justify-content-center">
                        <form method="POST" action="/admin/customers/{{ $customer->id }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-3">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $customer->first_name }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-3">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $customer->last_name }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="SSN" class="col-md-4 col-form-label text-md-right">{{ __('SSN') }}</label>

                                <div class="col-3">
                                    <input id="SSN" type="text" class="form-control @error('SSN') is-invalid @enderror" name="SSN" value="{{ $customer->SSN }}" required autocomplete="SSN">

                                    @error('SSN')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                                <div class="col-2">
                                    <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $customer->age }}" required autocomplete="age">

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                <div class="col-3">
                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $customer->date_of_birth }}" required autocomplete="date_of_birth" autofocus>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Occupation') }}</label>

                                <div class="col-3">
                                    <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ $customer->occupation }}" required autocomplete="occupation" autofocus>

                                    @error('occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_line_1" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 1') }}</label>

                                <div class="col-3">
                                    <input id="address_line_1" type="text" class="form-control @error('address_line_1') is-invalid @enderror" name="address_line_1" value="{{ $customer->address_line_1 }}" required autocomplete="address_line_1" autofocus>

                                    @error('address_line_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_line_2" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 2') }}</label>

                                <div class="col-3">
                                    <input id="address_line_2" type="text" class="form-control @error('address_line_2') is-invalid @enderror" name="address_line_2" value="{{ $customer->address_line_2 }}" required autocomplete="address_line_2" autofocus>

                                    @error('address_line_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-3">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $customer->city }}" required autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label>

                                <div class="col-3">
                                    <input id="postal_code" type="number" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $customer->postal_code }}" required autocomplete="postal_code" autofocus>

                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>

                                <div class="col-4 input-group-lg">
                                    <select id="country_code" class="custom-select @error('country_code') is-invalid @enderror" name="country_code" value="{{ $customer->country_code }}" required autocomplete="country_code">
                                        <option disable-selected>{{ $customer->country_code }}</option>
                                        @foreach ($countryCodes as $code => $country)
                                            <option value="{{ $code }}">{{ $country }}</option>
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

                                <div class="col-3">
                                    <input id="telephone" type="number" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ $customer->telephone }}" required autocomplete="telephone" autofocus>

                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $customer->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
