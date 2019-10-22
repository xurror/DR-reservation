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
        $requests = DB::table('requests')
            ->join('customers', 'customers.id', '=', 'requests.customer_id')
            ->join('packages', 'packages.id', '=', 'requests.package_id')
            ->select('requests.*', 'customers.first_name', 'customers.last_name', 'packages.description')
            ->get();
            
        return view('admin.index',
            [
                'requests' => $requests,
            ]
        );
    }
}
