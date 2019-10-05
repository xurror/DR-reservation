@extends('layouts.app')

@section('content')




    <div class="container">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/reservations">reservations</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add reservation</li>
                </ol>
            </nav>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Reservation</div>

                        <div class="card-body justify-content-center">
                            <form method="POST" action="/admin/reservation">
                                @csrf

                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                                    <div class="col-auto input-group-lg">
                                        <select id="status" class="custom-select @error('status') is-invalid @enderror" name="status" required autocomplete="status">
                                            <option selected>Choose...</option>
                                            @foreach ($customers as $customer)

                                            <option value="{{ $customer->id }}">{{ $customer->first_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                                    <div class="col-auto input-group-lg">
                                        <select id="status" class="custom-select @error('status') is-invalid @enderror" name="status" required autocomplete="status">
                                            <option selected>Choose...</option>
                                            <option value="1">Paid</option>
                                            <option value="2">Reserved</option>
                                            <option value="3">Three</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reservation Date') }}</label>

                                    <div class="col-3">
                                        <input id="reservation_date" type="date" class="form-control @error('reservation_date') is-invalid @enderror" name="reservation_date" value="{{ old('reservation_date') }}" required autocomplete="reservation_date" autofocus>

                                        @error('reservation_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="expiry_date" class="col-md-4 col-form-label text-md-right">{{ __('Expiry Date') }}</label>

                                    <div class="col-3">
                                        <input id="expiry_date" type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" value="{{ old('expiry_date') }}" required autocomplete="expiry_date">

                                        @error('expiry_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                                    <div class="col-auto input-group-lg">
                                        <select id="status" class="custom-select @error('status') is-invalid @enderror" name="status" required autocomplete="status">
                                            <option selected>Choose...</option>
                                            <option value="1">Paid</option>
                                            <option value="2">Reserved</option>
                                            <option value="3">Three</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="No_of_rooms" class="col-md-4 col-form-label text-md-right">{{ __('No of rooms') }}</label>

                                    <div class="col-2">
                                        <input id="No_of_rooms" type="number" class="form-control mr-sm-2" name="No_of_rooms" required autocomplete="No_of_rooms">

                                        @error('No_of_rooms')
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
