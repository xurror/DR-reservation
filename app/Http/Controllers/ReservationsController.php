<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Reservation;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = DB::table('reservations')
            ->join('customers', 'reservations.id', '=', 'customers.id')
            ->join('packages', 'reservations.id', '=', 'packages.id')
            ->join('payments', 'reservations.id', '=', 'payments.id')
            ->select('reservations.*', 'customers.*', 'packages.*', 'payments.*')
            ->get();

        return view(
            'admin.reservations.index',
            [
                'reservations'=> $reservations
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
        $customers = DB::table('customers')
            ->select('id', 'first_name', 'last_name')
            ->get();

        $packages = DB::table('packages')
            ->select('id')
            ->get();

        $payments = DB::table('reservations')
            ->select('id')
            ->get();

        return view(
            'admin.reservations.create',
            [
                'customers' => $customers,
                'packages' => $packages,
                'payments' => $payments
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
        error_log('store');
        // validate input
        $this->validate($request, [
            'customer_id' => 'required',
            'package_id' => 'required',
            'payment_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'status' => 'required',
            'No_of_packages' => 'required',
        ]);

        // Create customer
        $reservation = new Reservation;
        $reservation->customer_id = $request->input('customer_id');
        $reservation->package_id = $request->input('package_id');
        $reservation->payment_id = $request->input('payment_id');
        $reservation->from = $request->input('from');
        $reservation->to = $request->input('to');
        $reservation->status = $request->input('status');
        $reservation->No_of_packages = $request->input('No_of_packages');
        $reservation->save();

        // return redirect
        return redirect('/admin/reservations')->with('success', 'reservation made');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view(
            'admin.reservations.show',
            [
                'reservation', $reservation
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);

        $customers = DB::table('customers')
            ->select('id', 'first_name', 'last_name')
            ->where('id', $reservation->customer_id)
            ->get();
        $customer = $customers[0];

        $packages = DB::table('packages')
            ->select('id')
            ->where('id', $reservation->package_id)
            ->get();
        $package = $packages[0];

        $payments = DB::table('payments')
            ->select('id')
            ->where('id', $reservation->payment_id)
            ->get();
        $payment = $payments[0];



        $customers = DB::table('customers')
            ->select('id', 'first_name', 'last_name')
            ->get();

        $packages = DB::table('packages')
            ->select('id')
            ->get();

        $payments = DB::table('reservations')
            ->select('id')
            ->get();


        return view(
            'admin.reservations.edit',
            [
                'reservation'=> $reservation,
                'customer' => $customer,
                'package' => $package,
                'payment' => $payment,
                'customers' => $customers,
                'packages' => $packages,
                'payments' => $payments
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
        // validate input
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'status' => 'required',
            'No_of_packages' => 'required',
        ]);

        // Create customer
        $reservation = Reservation::find($id);
        $reservation->from = $request->input('reservation_date');
        $reservation->to = $request->input('to');
        $reservation->status = $request->input('reservation_status');
        $reservation->No_of_packages = $request->input('No_of_packages');
        $reservation->save();

        // return redirect
        return redirect(
            '/admin/reservations',
            [
                'success', 'reservation made'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        error_log('Delete '. $id);
        //$reservation->delete();
        return redirect(
            '/admin/reservations',
            [
                'success', 'Reservation deleted'
            ]
        );
    }
}
