<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all data from customer table
        // return Customer::all();        
        // return customer::orderBy('customer_id', 'asc')->get();

        // Return paginate
        // return customer::orderBy('customer_id', 'asc')->paginate(1);
        // return DB::select('SELECT * FROM customer');
        $customers = Customer::all();
        return view('customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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

        // Create Customer
        $customer = new Customer;
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->SSN = $request->input('SSN');
        $customer->age = $request->input('age');
        $customer->date_of_birth = $request->input('date_of_birth');
        $customer->occupation = $request->input('occupation');
        $customer->current_address = $request->input('current_address');
        $customer->telephone = $request->input('telephone');
        $customer->email = $request->input('email');
        $customer->save();

        // return redirect('/customer');
        return redirect('/customers')->with('success', 'Customer Created');

    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $customer = Customer::find($id);
        return view('customers.edit')->with('customer', $customer);
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

        // Create Customer
        $customer = Customer::find($id);
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->SSN = $request->input('SSN');
        $customer->age = $request->input('age');
        $customer->date_of_birth = $request->input('date_of_birth');
        $customer->occupation = $request->input('occupation');
        $customer->current_address = $request->input('current_address');
        $customer->telephone = $request->input('telephone');
        $customer->email = $request->input('email');
        $customer->save();

        return redirect('/customers')->with('success', 'Customer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customers')->with('success', 'Customer Deleted');
    }
}
