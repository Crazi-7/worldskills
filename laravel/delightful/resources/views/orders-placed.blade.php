@extends('layouts.app')
@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="page-header">Orders placed</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" class="form-inline" action="{{ route('orders') }}" method="GET">
                                    @csrf                  
                                    <div class="form-group">
                                        <label>Filter by: </label>
                                        <select class="form-control" name="filter">
                                            <option value="">Select status</option>
                                            <option value="Awaiting Approval">Awaiting Approval</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Disapproved">Disapproved</option>
                                            <option value="In production">In production</option>
                                            <option value="Out for Delivery">Out for delivery</option>
                                            <option value="Finished">Finished</option>                                             
                                        </select>
                                    </div>                                                                                                               
                                    <button type="submit" class="btn btn-primary">OK</button>                                        
                                </form>
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
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">   
                        <!-- /.panel-body -->                        
                        <div class="panel-body">                       
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Request number</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Client</th>
                                            <th class="text-center">Value of the order</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->date}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>AED {{$order->value+$fee}}</td>
                                            <td>{{$order->status}}</td>
                                            <td><a href="order/{{$order->id}}">See Details</a></td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
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