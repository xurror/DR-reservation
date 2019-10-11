<?php

use Illuminate\Http\Request;
use App\Libraries\PaypalInvoice;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whicurl
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('paypal-invoice', function (Request $request) {
    error_log('paypal invoice api');

    $data = $request->all();

    $invoice = new PaypalInvoice();

    // Get invoice address

    error_log('Creating invoice '.$data['email']);
    $invoice_id = $invoice->createInvoice($data);
    error_log('invoice created');

    error_log('Sending invoice');
    $invoice->sendInvoice($invoice_id);
    error_log('Invoice sent');

    unset($invoice);

});