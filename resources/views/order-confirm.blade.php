@extends('layouts.app')
@section('content')

                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Mahbub Enterprise</a></li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="{{ URL::to($order->photo) }}" style="height: 100px;width: 100px;" alt="velonic"></h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>
                                                    <strong>Today<br>{{ date('d/m/y ') }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name:{{ $order->name }}</strong><br>
                                                      <strong>Shop Name:{{ $order->shop_name }}</strong><br>
                                                      Address: {{ $order->address }}<br>
                                                      Phone: {{ $order->phone }}<br>
                                                      City: {{ $order->city }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong>{{ date('l jS \of F Y ') }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong>{{ $order->id }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>Serial</th>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        @php
                                                        $sl = 1;
                                                        @endphp
                                                        <tbody>
                                                        	@foreach($order_details as $con)
                                                            <tr>
                                                                <td>{{ $sl++ }}</td>
                                                                <td>{{ $con->product_name }}</td>
                                                                <td>{{ $con->product_code }}</td>
                                                                <td>{{ $con->quantity }}</td>
                                                                <td>{{ $con->unitcost }}</td>
                                                                <td>{{ $con->quantity*$con->unitcost }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;"><br>
                                        	<div class="col-md-9">
                                        	<p>Payment By: {{ $order->payment_status }}</p>
                                        	<p>Pay: {{ $order->pay }}</p>
                                        	<p>Due: {{ $order->due }}</p>
                                        	</div>
                                            <div class="col-md-3 ">
                                                <p class="text-right"><b>Sub-total:</b>{{ $order->sub_total }}</p>
                                                <p class="text-right">VAT: {{ $order->vat }}</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{ $order->total }}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($order->order_status == 'Approved')
                                        @else
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="{{ URL::to('/pos-done/'.$order->id) }}" class="btn btn-primary waves-effect waves-light">Done</a>
                                            </div>
                                        </div>
                                        
                                        @endif
                                    </div>
                           </div>
                       </div>
                     </div>
                  </div> <!-- container -->                               
                </div> <!-- content -->
            </div>


@endsection