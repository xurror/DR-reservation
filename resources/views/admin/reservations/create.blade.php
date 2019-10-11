@extends('layouts.app')

@section('content')

    <div class="container">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/reservations">reservations</a></li>
                    <li class="breadcrumb-item active" aria-current="page">add reservation</li>
                </ol>
            </nav>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Reservation</div>

                        <div class="card-body justify-content-center">
                            <form method="POST" action="/admin/reservations">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="form-group row">
                                    <label for="customer_id" class="col-md-4 col-form-label text-md-right">{{ __('Customer ID') }}</label>

                                    <div class="col-md-4 input-group-lg">
                                        <select id="customer_id" class="custom-select @error('customer_id') is-invalid @enderror" name="customer_id" required autocomplete="customer_id">
                                            <option selected></option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="package_id" class="col-md-4 col-form-label text-md-right">{{ __('Package ID') }}</label>

                                    <div class="col-auto input-group-lg">
                                        <select id="package_id" class="custom-select @error('package_id') is-invalid @enderror" name="package_id" required autocomplete="package_id">
                                            <option selected></option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->id }}</option>
                                            @endforeach
                                        </select>
                                        @error('package_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="from" class="col-md-4 col-form-label text-md-right">{{ __('From') }}</label>

                                    <div class="col-3">
                                        <input id="from" type="date" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ old('from') }}" required autocomplete="from" autofocus>

                                        @error('from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('To') }}</label>

                                    <div class="col-3">
                                        <input id="to" type="date" class="form-control @error('to') is-invalid @enderror" name="to" value="{{ old('to') }}" required autocomplete="to">

                                        @error('to')
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
                                            <option selected></option>
                                            <option value="Reserved/Paid">Reserved/Paid</option>
                                            <option value="Reserved/Partially Paid">Reserved/Partially Paid</option>
                                            <option value="Reserved/Unpaid">Reserved/Unpaid</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="No_of_packages" class="col-md-4 col-form-label text-md-right">{{ __('No of Packages') }}</label>

                                    <div class="col-2">
                                        <input id="No_of_packages" type="number" class="form-control @error('No_of_packages') is-invalid @enderror" name="No_of_packages" required autocomplete="No_of_packages">

                                        @error('No_of_packages')
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
