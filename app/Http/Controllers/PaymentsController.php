<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Payment::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return redirect to create page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate input
        /*
        $this->validate($request, [
            'ammount' => 'required',
            'payment_date' => 'required'
        ]);
        */

        // Create payment
        $payment = new Payment;
        $payment->amount = $request->input('amount');
        $payment->payment_date = $request->input('payment_date');
        $payment->save();

        // return redirect
        return redirect('/payment')->with('success', 'payment made');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Payment::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Payment::find($id);
        // return update uri
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
        //validate input
        /*
        $this->validate($request, [
            'ammount' => 'required',
            'payment_date' => 'required'
        ]);
        */

        // Create payment
        $payment = Payment::find($id);
        $payment->amount = $request->input('amount');
        $payment->payment_date = $request->input('payment_date');
        $payment->save();

        // return redirect
        return redirect('/payment')->with('success', 'payment made');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
