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
            <h1 class="text-center">Hello, Customer</h1>
        </div>
        <br>
        <br>
        <div class="jumbotron" style="background:purple;">
            <div class="jumbotron bg-light text-center text px-5">
                <br>
                <h2>Here's your invoice</h2>
                <br>
                <p>Digital Renter sent an invoice for $1000 USD</p>
                <br>
                <p>Minimum due: $250 USD</p>
                <br>
                <p>Due date: October 26, 2019</p>
                <br>
                <div class="row justify-content-md-center">
                    <div class="col-5">
                        <a href="" class="btn btn-warning btn-lg btn-block rounded-pill">{{ __('View and Pay Invoice with MoMo') }}</a>
                    </div>                    
                </div>
                <br>
                <hr>
                {{ __('Thanks for your purchase') }}
                <hr>
                <br>

            </div>
        </div>
    </div>
</body>
</html>