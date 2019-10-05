<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all
        $packages = package::all();
        return view('packages.index')->with('packages', $packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
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
            'package_size' => 'required',
            'package_description' => 'required',
            'package_price' => 'required',
            'package_status' => 'required'
        ]);

        // create package
        $package = new package;
        $package->package_size = $request->input('package_size');
        $package->package_description = $request->input('package_description');
        $package->package_price = $request->input('package_price');
        $package->package_status = $request->input('package_status');
        $package->save();

        // return redirect
        return redirect('/packages')->with('success', 'package created');
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
        $package = package::find($id);
        return view('packages.show')->with('package', $package);
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
        $package = package::find($id);
        return view('packages.edit')->with('package', $package);
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
            'package_size' => 'required',
            'package_description' => 'required',
            'package_price' => 'required',
            'package_status' => 'required'
        ]);

        // create package
        $package = package::find($id);
        $package->package_size = $request->input('package_size');
        $package->package_description = $request->input('package_description');
        $package->package_price = $request->input('package_price');
        $package->package_status = $request->input('package_status');
        $package->save();

        // return redirect
        return redirect('/packages')->with('success', 'package Updated');
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
        return redirect('/packages')->with('success', 'package Deleted');
    }
}
