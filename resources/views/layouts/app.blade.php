<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>    

    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        #myTable td:hover {
            cursor: pointer;
        }

        /*
        * Sidebar
        */
        
        .sidebar {
            position: fixed;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Behind the navbar */
            padding: 100;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }
        
        .sidebar-sticky {
            display: block;
            position: -webkit-sticky;
            position: sticky;
            top: 200px; /* Height of navbar */
            height: calc(100vh - 48px);
            padding-top: 5.5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }
        
        .sidebar .nav-link {
            color: #333;
        }
        
        .sidebar .nav-link {
            color: #999;
        }
        
        .sidebar .nav-link.active {
            color: #333;
            display: block;
        }
        
        .sidebar .nav-link:hover {
            color: #333;
            background: none;
        }
        
        .sidebar-heading {
            text-transform: uppercase;
        }
        
        /*
        * Navbar
        */
        .navbar-brand {
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }
        
        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }
        
        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg sticky-top position-sticky bg-dark flex-md-nowrap p-0">        
        <a class="px-5 navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>                         

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto pull-right">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item text-nowrap">
                    <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
                </li>
                <li class="nav-item text-nowrap dropdown px-5">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            @guest

                @if (Route::has('register'))
                    ...
                @endif
            @else
                <nav class="col-md-2 d-none d-md-block bg-white sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">
                                    <span class="fas fa-tachometer-alt"></span>
                                    &ensp; Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/customers">
                                    <span class="fas fa-users"></span>
                                    &ensp; Customers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/packages">
                                    <span class="fas fa-archive"></span>
                                    &ensp; Packages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/reservations">
                                    <span class="fas fa-hdd"></span>
                                    &ensp; Reservations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/payments">
                                    <span class="fas fa-money-check-alt"></span>
                                    &ensp; Payments
                                    <i class="fa fa-caret-down"></i>                                  
                                </a>

                                <ul class="nav flex-column px-5">
                                    <li class="nav-item">
                                        <a class="nav-link" href="">one</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Saved reports</span>
                            <a class="d-flex align-items-center text-muted" href="#">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>

                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            @endguest
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                @include('inc.messages')
                @yield('content')
            </main>
        </div>
    </div>
              
</body>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- PopperJs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        $(document).ready( function () {
            (function ($) {
                $.fn.serializeFormJSON = function () {

                    var o = {};
                    var a = this.serializeArray();
                    $.each(a, function () {
                        if (o[this.name]) {
                            if (!o[this.name].push) {
                                o[this.name] = [o[this.name]];
                            }
                            o[this.name].push(this.value || '');
                        } else {
                            o[this.name] = this.value || '';
                        }
                    });
                    return o;
                };
            })(jQuery);
        });
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
    
            window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
    
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
            });
            }, false);
        })();
    </script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

</html>