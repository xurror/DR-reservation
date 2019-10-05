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
            ->select('reservations.*', 'customers.*', 'packages.*')
            ->get();

        return view('admin.reservations.index', ['reservations'=> $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = DB::table('customers')
                    ->select('id', 'first_name')
                    ->get();

        $packages = DB::table('packages')
                ->select('id')
                ->get();

        return view('admin.reservations.create', ['customers' => $customers,
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
        // validate input
        $this->validate($request, [
            'reservation_date' => 'required',
            'expiry_date' => 'required',
            'status' => 'required',
            'No_of_packages' => 'required',
        ]);

        // Create customer
        $reservation = new Reservation;
        $reservation->reservation_date = $request->input('reservation_date');
        $reservation->expiry_date = $request->input('expiry_date');
        $reservation->status = $request->input('reservation_status');
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
        return view('admin.reservations.show')->with('reservation', $reservation);
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
        $customer = DB::table('customers')
                    ->select('first_name', 'last_name', 'telephone', 'email')
                    ->where('id', $reservation->customer_id)
                    ->get();
        $customer = $customer[0];
        $package = DB::table('packages')
                ->select('id', 'package_description', 'package_size', 'package_price', 'package_status')
                ->where('id', $reservation->package_id)
                ->get();
        $package = $package[0];

        return view('admin.reservations.edit', ['reservation'=> $reservation,
                                        'customer' => $customer,
                                        'package' => $package]);
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
            'reservation_date' => 'required',
            'expiry_date' => 'required',
            'status' => 'required',
            'No_of_packages' => 'required',
        ]);

        // Create customer
        $reservation = Reservation::find($id);
        $reservation->reservation_date = $request->input('reservation_date');
        $reservation->expiry_date = $request->input('expiry_date');
        $reservation->status = $request->input('reservation_status');
        $reservation->No_of_packages = $request->input('No_of_packages');
        $reservation->save();

        // return redirect
        return redirect('/admin/reservations')->with('success', 'reservation made');
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
        $reservation->delete();
        return redirect('/admin/reservations')->with('success', 'Reservation deleted');
    }
}
