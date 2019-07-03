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
        <div class="panel-heading"><h3 class="panel-title">Edit Product</h3></div>
        <!--error message validation-->
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="panel-body">
            <form role="form" method="post" action="{{ URL::to('update-product/'.$product->id) }}" enctype="multipart/form-data">
            	@csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Product Code</label>
                    <input type="text" class="form-control"  value="{{ $product->product_code }}" name="product_code">
                </div>
                 <div class="form-group">
                 <div class="form-group">
                    <label for="exampleInputPassword1">Buying Price</label>
                    <input type="text" class="form-control" name="buying_price" value="{{ $product->buying_price }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Selling Price</label>
                    <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}">
                </div>
                 <div class="form-group">
                 	<img id="image" src="#">
                    <label for="exampleInputPassword1">Product Photo</label>
                    <input type="file" name="product_image" accept="image/*" class="upload" required onchange="readURL(this);">
                </div>
                <div>
                    <img src="{{ URL::to($product->product_image) }}" name="old_photo" style="height: 70px;width:70px;">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Buy Date</label>
                    <input type="date" class="form-control" name="buy_date" value="{{ $product->buy_date }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Expire Date</label>
                    <input type="date" class="form-control" name="expire_date" value="{{ $product->expire_date }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Product Garage</label>
                    <input type="text" class="form-control" name="product_garage" value="{{ $product->product_garage }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Product Route</label>
                    <input type="text" class="form-control" name="product_route" value="{{ $product->product_route }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    @php
                    $cat = DB::table('categories')->get();
                    @endphp
                    <select name="cat_id" class="form-control">
                    	@foreach($cat as $row)

                    	<option value="{{ $row->id }}" <?php if($product->cat_id==$row->id) {echo "selected";} ?>>{{ $row->category_name }}</option>

                    	@endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Supplier</label>
                    @php
                    $sup = DB::table('suppliers')->get();
                    @endphp
                    <select name="sup_id" class="form-control">
                    	@foreach($sup as $row)
                    	<option value="{{ $row->id }}" <?php if($product->sup_id==$row->id) {echo "selected";} ?>>{{ $row->name }}</option>
                    	@endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
            </form>
        </div><!-- panel-body -->
    </div> <!-- panel -->
</div> <!-- col-->
  


	         </div>   
	    </div> <!-- container -->
	               
	</div> <!-- content -->

     </div>


  <script type="text/javascript">
     	function readURL(input){
     		if (input.files && input.files[0]) {
     		var reader = new FileReader();
     		reader.onload = function(e){
     			$('#image')
     			.attr('src', e.target.result)
     			.width(80)
     			.height(80);
     		};
     		reader.readAsDataURL(input.files[0]);
     	}
     }
     </script>

@endsection