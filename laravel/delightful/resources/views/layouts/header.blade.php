<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width. initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Delightful</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL('dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL('dist/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">
        @if (Auth::check())
            
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Delightful 
                        @if (Auth::user()->isEmployee())
                        Employee
                        @else
                        Customer
                        @endif

                    </a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links text-center">
                

                    @if (Auth::user()->isEmployee())
                    <li class="{{request()->is('orders') ? 'active' : ''}}"><a href="{{ route('orders') }}">Orders placed</a></li>
                    <li class="{{request()->is('tax') ? 'active' : ''}}"><a href="{{ route('taxfee') }}">Tax fee</a></li>
                    <li class="{{request()->is('register') ? 'active' : ''}}"><a href="{{ route('register') }}">Register an employee</a></li>
                    @else
                    <li class="{{request()->is('place-order') ? 'active' : ''}}"><a href="{{ route('place.order') }}">Orders</a></li>
                    <li class="{{request()->is('historic') ? 'active' : ''}}"><a href="{{ route('historic') }}">Historic</a></li>

                    @endif
                    <ul class="nav  navbar-right">
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul> 
                </ul>            

                <!-- /.navbar-top-links -->
            </nav>
        @endif