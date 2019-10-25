<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requests = DB::table('payment_requests')
            ->join('reservations', 'reservations.id', 'payment_requests.reservation_id')
            ->join('customers', 'customers.id', '=', 'reservations.customer_id')
            ->join('packages', 'packages.id', '=', 'reservations.package_id')
            ->join('payments', 'payments.id', '=', 'payment_requests.payment_id')
            ->select('payment_requests.*', 'payments.method', 'customers.first_name', 'customers.last_name', 'packages.description')
            ->get();
            
        return view('admin.index',
            [
                'requests' => $requests,
            ]
        );
    }
}
