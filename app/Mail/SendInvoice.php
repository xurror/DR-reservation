<?php

namespace App\Mail;

use App\Customer;
use App\Package;
use App\PaymentRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;

    private $payment_request;
    private $customer;
    private $package;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PaymentRequest $payment_request)
    {
        $this->payment_request = $payment_request;
        $this->customer = Customer::find($payment_request->customer_id);
        $this->package = Package::find($payment_request->package_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        error_log('sendInvoice class');
        return $this->from('kaze.nasser@outlook.com')
                ->view('emails.invoice')
                ->with([
                    'payment_request' => $this->payment_request,
                    'customer' => $this->customer,
                    'package' => $this->package,
                ]);
    }
}
