@extends('layouts.app')
@section('content')
</nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="page-header">Order details {{$order->id}}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-8 col-md-offset-2">
                    <p>Number: {{$order->id}}</p>
                    <p>Date: {{$order->date}}</p>
                    <p>Total Value: AED {{$order->value}}</p>
                   @if (!Auth::user()->isEmployee()) 
                    <div class="form-group ">
                            <label>Status</label>
                            
                                {{$order->status}}
                                                    
                        </div>  
                        
                        <br />  
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="local" value="" checked disabled> Home delivery
                                </label>
                            </div>
                        </div>                                                                        
                    @else    
                    <form role="form" class="form-inline" method="post"> 
                        @csrf
                        @method('put')
                        <div class="form-group ">
                            <label>Status</label>
                            <select name="status">
                                <option value="Approved">Approved</option>
                                <option value="Disapproved">Disapproved</option>
                                <option value="In production">In production</option>
                                <option value="Out for Delivery">Out for delivery</option>
                                <option value="Finished">Finished</option> 
                            </select>                            
                        </div>  
                        <button type="submit" class="btn btn-primary btn-xs">Change Status</button>   
                        <br />  
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="local" value="" checked disabled> Home delivery
                                </label>
                            </div>
                        </div>                                                                        
                    </form> 
                    @endif               
                </div>        
            </div>
            <!-- /.row -->       
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">   
                        <div class="panel-heading">
                            <h3 class="panel-title">Delivery address</h3>
                        </div>                    
                        <div class="panel-body"> 
                            Address: {{$order->address}}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
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
                                            <th class="text-center">Portions</th>
                                            <th class="text-center">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($products)
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td>AED {{$product->price}}</td>
                                            </tr>
                                            @endforeach
                                          @endif
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
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p class="col-md-12">Delivery fee: AED {{$fee}}</p>                
                    <p class="col-md-12">Total order amount: AED {{$order->value+$fee}}</p>                    
                </div>                 
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