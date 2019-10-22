<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Reservation;
use App\Customer;
use App\Package;
use App\Payment;
use Exception;

class PaymentsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = DB::table('payments')
            ->select('payments.*')
            ->paginate(10);

        return view(
            'admin.payments.index',
            [
                'payments'=> $payments
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservations = DB::table('reservations')
            ->select('id')
            ->get();

        return view(
            'admin.payments.create',
            [
                'reservations' => $reservations
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create payment
        $payment = new Payment;
        $payment->reservation_id = $request->input('reservation_id');
        $payment->amount = $request->input('amount');
        $payment->method = $request->input('method');
        $payment->date = $request->input('date');
        $payment->save();

        // return redirect
        return redirect('/admin/payments')->with('success', 'payment made');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $countryAbbr = config('countries.abbr');

        error_log($countryAbbr['CM']);
        error_log('Hop crap Nasser');

        try{
            $payment = Payment::find($id);

            $reservation_id = $payment->reservation_id;
            error_log($reservation_id);
            $reservation = Reservation::find($reservation_id);

            $customer_id = $reservation->customer_id;
            $customer = Customer::find($customer_id);

            $package_id = $reservation->package_id;
            $package = Package::find($package_id);

            return view(
                'admin.payments.show',
                [
                    'payment' => $payment,
                    'customer' => $customer,
                    'package' => $package,
                    'reservation' => $reservation,
                    'countryAbbr' => $countryAbbr,
                ]
            );

        } catch (Exception $e) {
            error_log('Ok Exception');
            $requests = DB::table('requests')->where('id', $id)->get();

            error_log(gettype($requests));
            $request = $requests[0];
            $request_id = $id;

            $customer_id = $request->customer_id;
            $customer = Customer::find($customer_id);

            $package_id = $request->package_id;
            $package = Package::find($package_id);

            return view(
                'admin.payments.show',
                [
                    'request_id' => $request_id,
                    'customer' => $customer,
                    'package' => $package,
                    'countryAbbr' => $countryAbbr,
                ]
            );
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::find($id);

        $reservations = DB::table('reservations')
            ->get();

        return view(
            'admin.payments.edit',
            [
                'payment'=> $payment,
                'reservations' => $reservations
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update payment
        $payment = Payment::find($id);
        $payment->reservation_id = $request->input('reservation_id');
        $payment->amount = $request->input('amount');
        $payment->method = $request->input('method');
        $payment->date = $request->input('date');
        $payment->save();

        // return redirect
        return redirect('/admin/payments')->with('success', 'payment made');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/admin/payments')->with('success', 'payment deleted');
    }
}
