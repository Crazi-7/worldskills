<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width. initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Delightful Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL('dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL('dist/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Delightful Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links text-center">
                <li class="{{request()->is('orders') ? 'active' : ''}}"><a href="orders.html">Orders</a></li>
                <li><a href="historic.html">Historic</a></li>
                <ul class="nav  navbar-right">
                    <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul> 
            </ul>            

            <!-- /.navbar-top-links -->
        </nav>