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

Route::get('momo-invoice', function (Request $request) {
    error_log('In MOMO backend');

    $data = $request->all();

    $telephone = $data['_tel'];
    $amount = $data['_amount'];
    // Works with this
    $amount = (string)$amount;
    // Does not work with this
    $amount = '50';

    $query_params = '?idbouton=2&typebouton=PAIE&_amount='.$amount.'&_tel=' . $telephone . '&_clP=&_email=kaze.nasser@outlook.com';
    // ?idbouton=2&typebouton=PAIE&_amount=50&_tel=677606594&_clP=&_email=batoumbiikond%40gmail.com
    error_log($query_params);

    error_log('Invoice sent to '.(int)$amount);

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, 'https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml' . $query_params);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        error_log("cURL Error #create invoice:" . $err);
    } else {
        error_log("I'm here");
        error_log($response);
        return $response;
    }
    
});
