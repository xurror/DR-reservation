<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $packages = DB::table('packages')
            ->select('packages.*')
            ->paginate(10);

        return view(
            'admin.packages.index',
            [
                'packages'=> $packages
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
        return view('admin.packages.create');
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
            'size' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        // create package
        $package = new package;
        $package->size = $request->input('size');
        $package->description = $request->input('description');
        $package->price = $request->input('price');
        $package->status = $request->input('status');
        $package->save();

        // return redirect
        return redirect('/admin/packages')->with('success', 'package created');
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
        return view('admin.packages.show')->with('package', $package);
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
        return view('admin.packages.edit')->with('package', $package);
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

        // create package
        $package = package::find($id);
        $package->size = $request->input('size');
        $package->description = $request->input('description');
        $package->price = $request->input('price');
        $package->status = $request->input('status');
        $package->save();

        // return redirect
        return redirect('/admin/packages')->with('success', 'package Updated');
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
