<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Package;

class ListingController extends Controller
{
    public function index() {
        //'image' => 'image|nullable|max:1999'
        $packages = DB::table('packages')
            ->select('packages.*')
            ->paginate(10);

        return view(
            'listings.index',
            [
                'packages'=> $packages
            ]
        );
    }

    public function show($id)
    {
        //
        $package = package::find($id);
        return view('listings.show')->with('package', $package);
    }
}
