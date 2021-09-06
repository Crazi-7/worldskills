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
                                <form role="form" class="form-inline">                       
                                    <div class="form-group">
                                        <label>Filter by: </label>
                                        <select class="form-control">
                                            <option>Select status</option>
                                            <option value="approved">Approved</option>
                                            <option value="disapproved">Disapproved</option>
                                            <option value="production">In production</option>
                                            <option value="delivery">Out for delivery</option>
                                            <option value="finished">Finished</option>                                             
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
                                        <tr>
                                            <td>0001</td>
                                            <td>00/00/0000</td>
                                            <td>Anakin Skywalker</td>
                                            <td>AED 100.00</td>
                                            <td>Approved</td>
                                            <td><a href="order-details.html">See Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>0002</td>
                                            <td>00/00/0000</td>
                                            <td>Dookan</td>
                                            <td>AED 100.00</td>
                                            <td>Approved</td>
                                            <td><a href="order-details.html">See Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>0003</td>
                                            <td>00/00/0000</td>
                                            <td>Luke</td>
                                            <td>AED 100.00</td>
                                            <td>In production</td>
                                            <td><a href="order-details.html">See Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>0004</td>
                                            <td>00/00/0000</td>
                                            <td>Obi-Wan Kenobi</td>
                                            <td>AED 100.00</td>
                                            <td>In production</td>
                                            <td><a href="order-details.html">See Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>0005</td>
                                            <td>00/00/0000</td>
                                            <td>Qui-Gon</td>
                                            <td>AED 100.00</td>
                                            <td>Finished</td>
                                            <td><a href="order-details.html">See Details</a></td>
                                        </tr>
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
