<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: "Raleway", sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #636b6f;
            background-color: #f5f8fa;
        }
        html {
            font-family: sans-serif;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        .tooltip {
            position: absolute;
            z-index: 1070;
            display: block;
            font-family: "Raleway", sans-serif;
            font-style: normal;
            font-size: 12px;
            filter: alpha(opacity=0);
            opacity: 0;
        }
        h1,h2,h3,h4,h5,h6,
        .h1,.h2,.h3,.h4,.h5,.h6 {
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: inherit;
        }
    </style>
    <title>{{ __('Invoice From Digital Renter') }}</title>
    
</head>


<body>
    <div class="container bg-white">
        <br>
        <div class="bg-light justify-content-center p-lg-3">
            <h1 class="text-center">{{ __('Hello, ' . $customer->first_name . ' ' . $customer->last_name)}}</h1>
        </div>
        <br>
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>                
        @else
            <div class="alert alert-danger">
                {{session('Failure')}}
            </div>
        @endif
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
                    <h5>{{ __('You have paid: ' . $payment->amount) }}</h5>
                    <h5>{{ __('You owe: ' . ($package->price - $payment->amount) . ' Frs CFA for this reservation') }}</h5>
                    <form action={{ url('/momo/validateInvoice') }} method="POST">
                        <div class="row justify-content-lg-end">
                            <div class="col-4 py-3">                                                                                                
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">{{ __('Telephone') }}</label>
                                    <div class="col-sm-8">
                                        <input type="tel" class="form-control form-control-sm" id="telephone" name="telephone" placeholder="telephone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                @if ($payment->amount == 0)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="amountChosen" id="amountDue" value="{{ __($package->price) }}" checked>
                                        <label class="form-check-label" for="amountDue">{{ __('Pay Amount Due  ' . $package->price . ' Frs CFA') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="amountChosen" id="minAmount" value="{{ __($package->price * 0.25) }}">
                                        <label class="form-check-label" for="minAmount">{{ __('Pay Minimun Amount  ' . ($package->price * 0.25) . ' Frs CFA') }}</label>
                                    </div>
    
                                    <div class="form-check">                                    
                                        <input class="form-check-input" id="amountRadio" type="radio" name="amountChosen">
                                        <div class="form-group row">
                                            <label for="amountRadio" class="form-check-label col-md-2 col-form-label col-form-label-sm text-md-left">{{ __('Pay ') }}</label>                
                                            <div class="col-lg-9">
                                                <input id="amountInput" type="text" class="form-control form-control-sm" name="amountChosen" value="{{ old('amount') }}" autocomplete="amount">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="amountChosen" id="amountDue" value="{{ __($package->price - $payment->amount) }}" checked>
                                        <label class="form-check-label" for="amountDue">{{ __('Complete Payment  ' . ($package->price - $payment->amount) . ' Frs CFA') }}</label>
                                    </div>
    
                                    <div class="form-check">                                    
                                        <input class="form-check-input" id="amountRadio" type="radio" name="amountChosen">
                                        <div class="form-group row">
                                            <label for="amountRadio" class="form-check-label col-md-2 col-form-label col-form-label-sm text-md-left">{{ __('Pay ') }}</label>                
                                            <div class="col-lg-9">
                                                <input id="amountInput" type="text" class="form-control form-control-sm" name="amountChosen" value="{{ old('amount') }}" autocomplete="amount">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            
                            <div class="col-4 py-3">
                                @if ($payment->amount == 0)
                                    <button type="submit" id="pay" class="btn btn-warning">{{ __('Pay ' . $package->price . ' Frs CFA') }}</button>    
                                @else
                                    <button type="submit" id="pay" class="btn btn-warning">{{ __('Pay ' . ($package->price - $payment->amount) . ' Frs CFA') }}</button>
                                @endif                                
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="payment_request" value="{{ __($payment_request->id) }}">
                        <input type="hidden" name="amount" id="amount" value="{{ __($package->price - $payment->amount) }}">
                    </form>
                    <hr>
                    <h6 class="text-muted">{{ __('Thanks for your purchase') }}</h6>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $("#amountRadio").on("input", function(){
        var amount = $("#amountInput").val();
        if (amount == '') {
            $("#pay").text('Pay 0 Frs CFA');
            $('#amount').val(0);
        } else {
            $("#pay").text('Pay ' + amount + ' Frs CFA');
            $('#amount').val(amount);
        }
        
    });

    $("#amountInput").on("input", function(){
        $("#pay").text('Pay ' + $(this).val() + ' Frs CFA');
        $('#amount').val($(this).val());
    });

    $("#amountDue").on("input", function(){
        $("#pay").text('Pay ' + $(this).val() + ' Frs CFA');
        $('#amount').val($(this).val());
    });

    $("#minAmount").on("input", function(){
        $("#pay").text('Pay ' + $(this).val() + ' Frs CFA');
        $('#amount').val($(this).val());
    });

});
</script>

</html>