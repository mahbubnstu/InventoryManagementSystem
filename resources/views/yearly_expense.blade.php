@extends('layouts.app')
@section('content')


<div class="content-page">
	<div class="content">
	    <div class="container">

	        <!-- Page-Title -->
	        <div class="row">
	            <div class="col-sm-12">
	                <h4 class="pull-left page-title">Welcome !</h4>
	                <ol class="breadcrumb pull-right">
	                    <li><a href="#">Echobvel</a></li>
	                    <li class="active">IT</li>
	                </ol>
	            </div>
	        </div>
	        
	        

		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading">
		<h3 class="panel-title text-danger" >{{ date("Y") }} All Expense
		
		</h3>
		
		</div>
		<div class="panel-body">
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		    <table id="datatable" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                
		                <th>Details</th>
		                <th>Amount</th>
		               
		            </tr>
		        </thead>

		 
		        <tbody>
		        	@foreach($yr as $row)
		            <tr>
		                
		                <td>{{ $row->details }}</td>
		                <td>{{ $row->amount }}</td>
		                
		            </tr>
		            @endforeach
		            
		        </tbody>
		    </table>

		            @php
			        $year = date("Y");
			        $expense = DB::table('expenses')->where('year',$year)->sum('amount');
			        @endphp
			        <h3 style="color: red;font-size: 30px;" align="center">Yearly Expense: {{ $expense }} Taka</h3>


		</div>
		</div>
		</div>
		</div>
		</div>


	         </div>   
	    </div> <!-- container -->	               
	</div> <!-- content -->

     </div>




@endsection