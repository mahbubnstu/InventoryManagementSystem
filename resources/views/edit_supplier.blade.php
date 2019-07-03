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
        <div class="panel-heading"><h3 class="panel-title">Update Supplier Information</h3></div>
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
            <form role="form" method="post" action="{{ URL::to('update-supplier/'.$edit->id) }}" enctype="multipart/form-data">
            	@csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $edit->name }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control"  value="{{ $edit->email }}" name="email"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $edit->phone }}"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Shop Name</label>
                    <input type="text" class="form-control" name="shop" value="{{ $edit->shop }}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $edit->address }}" required>
                </div>
                 <div class="form-group">
                 	<img id="image" src="#">
                    <label for="exampleInputPassword1">New Photo</label>
                    <input type="file" name="photo" accept="image/*" class="upload"  onchange="readURL(this);">
                </div>
                <div>
                    <img src="{{ URL::to($edit->photo) }}" name="old_photo" style="height: 70px;width:70px;">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Bank Name</label>
                    <input type="text" class="form-control" name="bankname" value="{{ $edit->bankname }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" class="form-control" name="city" value="{{ $edit->city }}"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Account Number</label>
                    <input type="text" class="form-control" name="accountnumber" value="{{ $edit->accountnumber }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Account Branch</label>
                    <input type="text" class="form-control" name="branchname" value="{{ $edit->branchname }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Account Holder</label>
                    <input type="text" class="form-control" name="accountholder" value="{{ $edit->accountholder }}">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Supplier Type</label>
                    <select name="type" class="form-control">
                        <option value="{{ $edit->type }}">{{ $edit->type }}</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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