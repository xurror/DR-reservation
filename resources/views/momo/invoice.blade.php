<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{{ __('Invoice From Digital Renter') }}</title>
</head>
<body>
    <div class="container bg-white">
        <br>
        <div class="bg-light justify-content-center p-lg-3">
            <h1 class="text-center">{{ __('Hello, ' . $customer->first_name . ' ' . $customer->last_name)}}</h1>
        </div>
        <br>
        <br>
        <div class="jumbotron" style="background:purple;">
            <div class="jumbotron py-5 bg-white text">
                <div class="container px-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-left">{{ __('Digital Renter') }}</div>
                            <div class="text-left">{{ __('1234 First Street') }}</div>
                            <div class="text-left">{{ __('CA 98765') }}</div>
                            <div class="text-left">{{ __('United States') }}</div>
                            <br>
                            <div class="text-left">{{ __('Phone: 237 697003536') }}</div>
                            <div class="text-left">{{ __('kazenasser@gmail.com') }}</div>
                            <div class="text-left">{{ __('www.digitalrenter.com') }}</div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">{{ __('Invoice #:######0036') }}</div>
                            <div class="text-right">{{ __('Invoice Date:16 Oct 2019') }}</div>
                            <div class="text-right">{{ __('Reference:deal-ref') }}</div>
                            <div class="text-right">{{ __('Due date:26 Oct 2019') }}</div>
                            <div class="text-right">{{ __('Phone: 237 697003536') }}</div>
                            <div class="row justify-content-md-end">
                                <div class="card py-2 col-5">
                                    <div class="text-center">{{ __('Amount due') }}</div>
                                    <div class="text-center font-weight-bold">{{ __($package->price . ' Frs CFA') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
                <hr>
                <div class="container px-5">
                    <div class="text-left font-weight-bold mb-0">{{ __('Bill To:') }}</div>
                    <br>
                    <div class="text-left">{{ __($customer->first_name .' '. $customer->last_name) }}</div>
                    <div class="text-left">{{ __($customer->address_line_1) }}</div>
                    <div class="text-left">{{ __($customer->city) }}</div>
                    <div class="text-left">{{ __($customer->country_code) }}</div>
                    <div class="text-left">{{ __('Phone: ' . $customer->telephone) }}</div>
                    <br>
                    <div class="text-left">{{ __($customer->email) }}</div>
                </div> 
                <hr>
                <div class="container px-5">
                    
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <th width="60%">{{ __('Description') }}</th>
                            <th class="text-left">{{ __('Quantity') }}</th>
                            <th class="text-left">{{ __('Price') }}</th>
                            <th class="text-left">{{ __('Amount') }}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="60%">{{ __($package->description) }}</td>
                                <td class="text-left">{{ __('1') }}</td>
                                <td class="text-left">{{ __($package->price .' Frs CFA') }}</td>
                                <td class="text-left">{{ __($package->price .' Frs CFA') }}</td>
                            </tr>                                
                        </tbody>
                    </table>
                    <hr>
                    <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <td width="60%">{{ __('') }}</td>
                                <td width="25%" class="text-left" colspan="2">{{ __('Subtotal') }}</td>
                                <td class="text-left">{{ __($package->price .' Frs CFA') }}</td>
                            </tr>
                            <tr>
                                <td width="60%">{{ __('') }}</td>
                                <td width="25%" class="text-left" colspan="2">{{ __('Sales Tax (7.25%)') }}</td>
                                <td class="text-left">{{ __('$10 USD') }}</td>
                            </tr>
                            <tr>
                                <td width="60%">{{ __('') }}</td>
                                <th width="25%" class="text-left" colspan="2">{{ __('Total') }}</th>
                                <td class="text-left">{{ __($package->price .' Frs CFA') }}</td>
                            </tr>
                            <tr>
                                <td width="60%">{{ __('') }}</td>
                                <th width="25%" class="text-left" colspan="2">{{ __('Minimum Amount Due') }}</th>
                                <td class="text-left">{{ __($package->price * 0.25 .' Frs CFA') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                
                <div class="card-footer">                
                    <form action="{{ url('/momo/validateInvoice') }}" method="POST">
                        <div class="row justify-content-lg-end">
                            <div class="col-3">                                
                                <input type="text" class="form-control" name="amount" id="">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" class="form-control" name="telephone" id="" value="652741226">
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-warning">{{ __('Pay') }}</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-muted">{{ __('Thanks for your purchase') }}</h6>
                </div>
            </div>
        </div>
    </div>
</body>
</html>