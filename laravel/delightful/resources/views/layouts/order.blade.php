@extends('layouts.app')
@section('content')
<!-- /.navbar-top-links -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h1 class="page-header">Place Order</h1>
                </div>
                <!-- /.col-lg-12 -->

            </div>
            @if ($errors -> any())
            <div class="error">
                @foreach ($errors->all as $error)

              <li>  {{$error}} </li>
              @endforeach
            </div>
            @endif
            <!-- /.row -->
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('order.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Order Items</label>
                                            @foreach ($products as $product)
                                            <div class="checkbox">
                                                <label class="col-md-6">
                                                    <input name="product[]" type="checkbox" value="{{$product->id}}">{{$product->name}} (AED {{$product->price}})
                                                </label>
                                                <div class="col-md-6">
                                                    <select>
                                                        <option>Qtt</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>    
                                                    </select>
                                                </div>                                                
                                            </div>
                                            
                                            @endforeach

                                        </div>                                    
                                        <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="local" value="0">Pick up at the restaurant
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="local" value="1" checked>Home delivery
                                                </label>
                                            </div>
                                        </div>                                    
                                        <div class="form-group">
                                            <label>Delivery / pick-up time</label>
                                            <input class="form-control" name="time" placeholder="Enter time">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" placeholder="Enter your address">
                                        </div>
                                        <div class="form-group">
                                            <label>Number</label>
                                            <input class="form-control" name="number" placeholder="Enter the number" name="email" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Neighborhood</label>
                                            <input class="form-control" name="neighborhood" placeholder="Enter your neighborhood" name="tel" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" name="city" placeholder="Enter your city" name="text" type="text" value="">
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Finish</button>                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-12 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../dist/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
@endsection