<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Delightful Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<!-- @if(isset(Auth::user()->email))
<script>window.location="/order" </script>
@endif -->
<body>

    <div class="container">
        <div class="row">
            @if($message = Session::get('error'))
            <div><h1>{{$message}}</h1> </div>
            @endif

            @if ($errors -> any())
            <div class="error">
                @foreach ($errors->all as $error)

              <li>  {{$error}} </li>
              @endforeach
            </div>
            @endif
            <div class="col-md-4 col-md-offset-4"> 
                <img style="width:149px;margin:20% auto 0 auto;display:block;" src="../dist/img/logo.jpg" title="Logo" />
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action=""> @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../dist/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>


