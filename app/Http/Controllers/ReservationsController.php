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
            ->select('reservations.*')
            ->paginate(10);

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

        return view(
            'admin.reservations.create',
            [
                'customers' => $customers,
                'packages' => $packages
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

        error_log($request->input('payment_id'));

        // Create customer
        $reservation = new Reservation;
        $reservation->customer_id = $request->input('customer_id');
        $reservation->package_id = $request->input('package_id');
        $reservation->from = $request->input('from');
        $reservation->to = $request->input('to');
        $reservation->status = $request->input('status');
        $reservation->No_of_packages = $request->input('No_of_packages');
        $reservation->save();

        error_log("saved");

        // return redirect
        return redirect('/admin/reservations')
            ->with('success', 'reservation made');
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

        $customers = DB::table('customers')
            ->select('id', 'first_name', 'last_name')
            ->get();

        $packages = DB::table('packages')
            ->select('id')
            ->get();




        return view(
            'admin.reservations.edit',
            [
                'reservation'=> $reservation,
                'customer' => $customer,
                'package' => $package,
                'customers' => $customers,
                'packages' => $packages
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
        error_log('update');

        // Create customer
        $reservation = Reservation::find($id);
        $reservation->customer_id = $request->input('customer_id');
        $reservation->package_id = $request->input('package_id');
        $reservation->from = $request->input('from');
        $reservation->to = $request->input('to');
        $reservation->status = $request->input('status');
        $reservation->No_of_packages = $request->input('No_of_packages');
        $reservation->save();

        // return redirect
        return redirect('/admin/reservations')
            ->with('success', 'reservation made');
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
        $reservation->delete();
        return redirect('/admin/reservations')
            ->with('success', 'Reservation deleted');
    }
}
