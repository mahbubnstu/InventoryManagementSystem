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
        <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
        <a href="{{ route('all.employee') }} "class="btn btn-sm btn-info pull-right">View All Employee</a>
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
            <form role="form" method="post" action="{{ route('insert-employee') }}" enctype="multipart/form-data">
            	@csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="name"required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control"  placeholder="email" name="email"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="phone"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Salary</label>
                    <input type="text" class="form-control" name="salary" placeholder="salary"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="address"required>
                </div>
                 <div class="form-group">
                 	<img id="image" src="#">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" name="photo" accept="image/*" class="upload" required onchange="readURL(this);">
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">NID</label>
                    <input type="text" class="form-control" name="nid" placeholder="NID NO"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" class="form-control" name="city" placeholder="city"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Experience</label>
                    <input type="text" class="form-control" name="experience" placeholder="experience"required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Vacation</label>
                    <input type="text" class="form-control" name="vacation" placeholder="vacation"required>
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