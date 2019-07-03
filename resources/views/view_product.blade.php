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
        <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
        
        
        
        		<div class="panel-body">
        			<img src="{{ URL::to($product->product_image) }}" style="height: 80px;width: 80px;">
        		</div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <p>{{ $product->product_name }}</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Product Code</label>
                    <p>{{ $product->product_code }}</p>
                </div>
                 <div class="form-group">
                 <div class="form-group">
                    <label for="exampleInputPassword1">Buying Price</label>
                    <p>{{ $product->buying_price }}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Selling Price</label>
                    <p>{{ $product->selling_price }}</p>
                </div>
                 
                <div class="form-group">
                    <label for="exampleInputPassword1">Buy Date</label>
                    <p>{{ $product->buy_date }}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Expire Date</label>
                    <p>{{ $product->expire_date }}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Product Garage</label>
                    <p>{{ $product->product_garage }}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Product Route</label>
                    <p>{{ $product->product_route }}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <p>{{ $product->category_name }}</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Supplier</label>
                    <p>{{ $product->name }}</p>
                </div>
                
                
            </form>
        </div><!-- panel-body -->
    </div> <!-- panel -->
</div> <!-- col-->
  


	         </div>   
	    </div> <!-- container -->
	               
	</div> <!-- content -->

     </div>




@endsection