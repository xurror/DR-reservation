<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all data from customer table
        return Customer::all();        
        // return customer::orderBy('customer_id', 'asc')->get();

        // Return paginate
        // return customer::orderBy('customer_id', 'asc')->paginate(1);
        //return DB::select('SELECT * FROM customer');
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
        // validate input
        /*
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'SSN' => 'required',
            'age' => 'required',
            'date_of_birth' => 'required',
            'occupation' => 'required',
            'current_address' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ]);
        */

        // Create Customer
        $customer = new Customer;
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->SSN = $request->input('SSN');
        $customer->age = $request->input('age');
        $customer->date_of_birth = $request->input('date_of_birth');
        $customer->current_address = $request->input('current_address');
        $customer->telephone = $request->input('telephone');
        $customer->email = $request->input('email');
        $customer->save();

        // return redirect('/customer');
        return redirect('/customer')->with('success', 'Customer Created');

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
        return Customer::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Customer::find($id);
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
        // validate input
        /*
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'SSN' => 'required',
            'age' => 'required',
            'date_of_birth' => 'required',
            'occupation' => 'required',
            'current_address' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ]);
        */

        // Create Customer
        $customer = Customer::find($id);
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->SSN = $request->input('SSN');
        $customer->age = $request->input('age');
        $customer->date_of_birth = $request->input('date_of_birth');
        $customer->current_address = $request->input('current_address');
        $customer->telephone = $request->input('telephone');
        $customer->email = $request->input('email');
        $customer->save();

        // return redirect('/customer');
        return redirect('/customer')->with('success', 'Customer Created');

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
