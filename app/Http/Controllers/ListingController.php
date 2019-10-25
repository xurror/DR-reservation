<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PaymentRequest;
use App\Package;

class ListingController extends Controller
{
    public function index() {
        //'image' => 'image|nullable|max:1999'
        $payment_request = new PaymentRequest();
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
        $package = package::find($id);
        return view('listings.show')->with('package', $package);
    }

    public function reservation($id) {
        $package = package::find($id);
        return view('listings.reserve')->with('package', $package);
    }

    public function reserve(Request $request){
        
        $customer_id = DB::table('customers')->insertGetId(
            [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'SSN' => $request->input('SSN'),
                'age' => $request->input('age'),
                'date_of_birth' => $request->input('date_of_birth'),
                'occupation' => $request->input('occupation'),
                'address_line_1' => $request->input('address_line_1'),
                'address_line_2' => $request->input('address_line_2'),
                'city' => $request->input('city'),
                'postal_code' => $request->input('postal_code'),
                'country_code' => $request->input('country_code'),
                'telephone' => $request->input('telephone'),
                'email' => $request->input('email'),
            ]
        );

        $reservation_id = DB::table('reservations')->insertGetId(
            [
                'customer_id' => $customer_id,
                'package_id' => $request->input('package_id'),
                'to' => $request->input('from'),
                'from' => $request->input('to'),
            ]
        );

        $payment_id = DB::table('payments')->insertGetId(
            [
                'amount' => 0,
                'method' => $request->input('method')
            ]
        );

        DB::table('payment_requests')->updateOrInsert(
            [
                'reservation_id' => $reservation_id,
                'payment_id' => $payment_id,
            ]
        );

        return redirect('/')->with('success', 'Your request was properly processed, an email will be sent to you soon with the transaction details');

    }
}
