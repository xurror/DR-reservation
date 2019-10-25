<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendInvoice;
use App\PaymentRequest;
use App\Reservation;
use App\Customer;
use App\Package;
use App\Payment;

class MoMoController extends Controller
{
    public function sendInvoice(Request $request) {
        // $id = $customer_id
        // Send email with invoice link
        $payment_request_id = $request->input('request_id');
        // error_log($payment_request_id);
        
        $payment_request = PaymentRequest::find($payment_request_id);

        // $customer = Customer::find($payment_request->customer_d);
        // $recipient = $customer->email;
        // For development I use my email address
        $recipient = 'kazenasser@gmail.com';
        Mail::to($recipient)->send(new SendInvoice($payment_request));

        error_log('email sent');

        return redirect('/admin/payments')->with('success', 'payment made');
    }
    
    public function showInvoice($id) {
        $payment_request = PaymentRequest::find($id);

        // Display request details
        // input for partial payment (minimum 25% total)
        // input for telephone number

        $reservation = Reservation::find($payment_request->reservation_id);
        $customer = Customer::find($reservation->customer_id);
        $package = Package::find($reservation->package_id);
        $payment = Payment::find($payment_request->payment_id);

        return view('momo.invoice',
            [
                'payment_request' => $payment_request,
                'customer' => $customer,
                'package' => $package,
                'payment' => $payment,
            ]
        );        
    }

    public function validateInvoice(Request $request) {
        error_log('validate Invoice');
        $payment_request_id = $request->input('payment_request');
        $telephone = $request->input('telephone');
        $amount = (int)$request->input('amount');

        error_log('amount = ' . $amount . ' and telephone ' . $telephone);

        // Works with this
        // $amount = (string)$amount;
        // Does not work with this
        // $amount = 50;

        $query_params = '?idbouton=2&typebouton=PAIE&_amount='.$amount.'&_tel=' . $telephone . '&_clP=&_email=kaze.nasser@outlook.com';
        // ?idbouton=2&typebouton=PAIE&_amount=50&_tel=677606594&_clP=&_email=batoumbiikond%40gmail.com
        //error_log($query_params);

        error_log('Invoice of '.(int)$amount);

        
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
            $response = json_decode($response);
            if ($response->StatusDesc == "Transaction couldn't be completed") {
                return redirect('/momo/invoice/'.$payment_request_id)->with('Failure', 'Please enter a valid phone number');
            } elseif ($response->StatusDesc == "General failure.") {
                return redirect('/momo/invoice/'.$payment_request_id)->with('Failure', 'The transaction was cancelled');
            } elseif ($response->StatusDesc == "TARGET_AUTHORIZATION_ERROR") {
                return redirect('/momo/invoice/'.$payment_request_id)->with('Failure', 'The account holder of this number cannot carry out this transaction \n'.
                                                                                        'Make sure the account holder has enough money');
            } else {
                DB::update('update payments set amount = '. $amount .' where id = ?', [$payment_request_id]);
                return redirect('/')->with('success', 'payment made');
            }
        }
    }
}
