@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-auto msb py-8" id="msb">
        <div class="container-fluid">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="navbar-header">
                    <div class="brand-wrapper">
                        <!-- Brand -->
                        <div class="brand-name-wrapper">
                            <a class="navbar-brand" href="#">
                                Digital Renter
                            </a>
                        </div>
                    </div>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item"><a href="/admin"><span class="glyphicon glyphicon-globe"></span> Dashboard</a></li>
                    <li class="nav-item"><a href="/admin/customers"><span class="glyphicon glyphicon-globe"></span> Customers</a></li>
                    <li class="nav-item"><a href="/admin/reservations"><span class="glyphicon glyphicon-signal"></span> Reservations</a></li>
                    <li class="nav-item"><a href="/admin/settings"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                    <li class="nav-item"><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-9">

    </div>
</div>

@endsection
