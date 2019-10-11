@extends('layouts.app')

@section('content')

    <div class="container">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/packages">Packages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Edit Package</h5>
                        <h5 class="pull-right">{{ $package->id }}</h5>
                    </div>

                    <div class="card-body justify-content-center">
                        <form method="POST" action="/admin/packages/{{ $package->id }}" id="package_form">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>

                                <div class="col-2">
                                    <input id="size" type="number" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ $package->size }}" required autocomplete="size">

                                    @error('size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-4">
                                    <textarea form="package_form" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $package->description }}" description required autocomplete="description">
                                           {{ $package->description }}
                                    </textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-2">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $package->price }}" required autocomplete="price">

                                    @error('price')
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
                                        <option selected>{{ $package->status }}</option>
                                        <option value="Free">Reserved/Paid</option>
                                        <option value="Reserved/Occupied">Reserved/Partially Paid</option>
                                        <option value="Reserved/Unoccupied">Reserved/Unpaid</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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
