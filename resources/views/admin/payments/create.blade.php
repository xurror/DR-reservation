@extends('layouts.app')

@section('content')

<div class="container">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/payments">payments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add payment</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Payment</div>

                    <div class="card-body justify-content-center">
                        <form method="POST" action="/admin/packages">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <div class="form-group row">
                                <label for="reservation_id" class="col-md-4 col-form-label text-md-right">{{ __('Reservation ID') }}</label>

                                <div class="col-auto input-group-lg">
                                    <select id="reservation_id" class="custom-select @error('reservation_id') is-invalid @enderror" name="reservation_id" required autocomplete="reservation_id">
                                        <option selected></option>
                                        @foreach ($reservations as $reservation)
                                            <option value="{{ $reservation->id }}">{{ $reservation->id }}</option>
                                        @endforeach
                                    </select>
                                    @error('reservation_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-2">
                                    <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount">

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="method" class="col-md-4 col-form-label text-md-right">{{ __('Method') }}</label>

                                <div class="col-auto input-group-lg">
                                    <select id="method" class="custom-select @error('method') is-invalid @enderror" name="method" required autocomplete="method">
                                        <option selected></option>
                                        <option value="Paypal">Paypal</option>
                                        <option value="MoMo">MoMo</option>
                                        <option value="Cash">Cash</option>
                                    </select>
                                    @error('method')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                <div class="col-3">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">

                                    @error('date')
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