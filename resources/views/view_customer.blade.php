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
<!-- Basic example -->
<div class="col-md-2"></div>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">View Customer</h3></div>
        <div class="panel-body">
           
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $single->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control"  value="{{ $single->email }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $single->phone }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Bank Name</label>
                    <input type="text" class="form-control" name="bank_name" value="{{ $single->bank_name }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $single->address }}">
                </div>
                 <div class="form-group">
                 	<img id="image" style="height: 70px;width: 70px;" src="{{ URL::to($single->photo) }}">
                    <label for="exampleInputPassword1">Photo</label>
                    
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Account Branch</label>
                    <input type="text" class="form-control" name="account_branch" value="{{ $single->account_branch }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" class="form-control" name="city" value="{{ $single->city }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Account Holder</label>
                    <input type="text" class="form-control" name="account_holder" value="{{ $single->account_holder }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Account Number</label>
                    <input type="text" class="form-control" name="account_number" value="{{ $single->account_number }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Shop Name</label>
                    <input type="text" class="form-control" name="shop_name" value="{{ $single->shop_name }}">
                </div>
                
                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
            
        </div><!-- panel-body -->
    </div> <!-- panel -->
</div> <!-- col-->
  


	         </div>   
	    </div> <!-- container -->
	               
	</div> <!-- content -->

     </div>


  
@endsection