<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all
        $rooms = Room::all();
        return view('rooms.index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
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
            'room_size' => 'required',
            'room_description' => 'required',
            'room_price' => 'required',
            'room_status' => 'required'
        ]);

        // create room
        $room = new Room;
        $room->room_size = $request->input('room_size');
        $room->room_description = $request->input('room_description');
        $room->room_price = $request->input('room_price');
        $room->room_status = $request->input('room_status');
        $room->save();

        // return redirect
        return redirect('/rooms')->with('success', 'Room created');
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
        $room = Room::find($id);
        return view('rooms.show')->with('room', $room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $room = Room::find($id);
        return view('rooms.edit')->with('room', $room);
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
            'room_size' => 'required',
            'room_description' => 'required',
            'room_price' => 'required',
            'room_status' => 'required'
        ]);

        // create room
        $room = Room::find($id);
        $room->room_size = $request->input('room_size');
        $room->room_description = $request->input('room_description');
        $room->room_price = $request->input('room_price');
        $room->room_status = $request->input('room_status');

        // return redirect
        return redirect('/rooms')->with('success', 'Room created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::find($id);
        $customer->delete();
        return redirect('/rooms')->with('success', 'Room Deleted');
    }
}
