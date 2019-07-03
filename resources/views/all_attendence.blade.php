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
	                    <li><a href="#">ABC Company</a></li>
	                    <li class="active">IT</li>
	                </ol>
	            </div>
	        </div>

	        

		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading">
		<h3 class="panel-title">All Attendence
			<a href="{{ route('take.attendence') }} "class="btn btn-sm btn-info pull-right">Take New</a>
		</h3>
		
		</div>
		<div class="panel-body">
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			
		    <table id="datatable" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th>Sl</th>
		                <th>Date</th>
		                
		                <th>Action</th>
		            </tr>
		        </thead>

		 
		        <tbody>
		        	<?php $i = 0; ?>
		        	
		            <tr>
		            	@foreach($attendence as $row)
		            	<?php $i++ ?>
		                <td><?php echo "$i"; ?></td>
		                <td>{{ $row->att_date }}</td>

		                <td>
		                	<a href="{{ URL::to('/edit-attendence/'.$row->att_date) }}" class="btn btn-sm btn-info" >Edit</a>

		                	<a href="{{ URL::to('/view-attendence/'.$row->att_date) }}" class="btn btn-sm btn-danger" >View</a>
		                </td>
		            </tr>
		           @endforeach
		            
		        </tbody>
		    </table>

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