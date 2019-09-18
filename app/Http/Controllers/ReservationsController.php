<?php

namespace App\Http\Controllers;

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
        $reservations = Reservation::all();
        return view('reservations.index')->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
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
            'No_of_rooms' => 'required',
        ]);

        // Create customer
        $reservation = new Reservation;
        $reservation->reservation_date = $request->input('reservation_date');
        $reservation->expiry_date = $request->input('expiry_date');
        $reservation->status = $request->input('reservation_status');
        $reservation->No_of_rooms = $request->input('No_of_rooms');
        $reservation->save();

        // return redirect
        return redirect('/reservations')->with('success', 'reservation made');
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
        return view('reservations.show')->with('reservation', $reservation);
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
        return view('reservations.edit')->with('reservation', $reservation);
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
            'No_of_rooms' => 'required',
        ]);

        // Create customer
        $reservation = Reservation::find($id);
        $reservation->reservation_date = $request->input('reservation_date');
        $reservation->expiry_date = $request->input('expiry_date');
        $reservation->status = $request->input('reservation_status');
        $reservation->No_of_rooms = $request->input('No_of_rooms');
        $reservation->save();

        // return redirect
        return redirect('/reservations')->with('success', 'reservation made');
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
        return redirect('/reservations')->with('success', 'Reservation deleted');
    }
}
