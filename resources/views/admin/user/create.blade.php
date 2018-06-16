@extends('admin.layouts.master')

@section('title') Create User @stop

@section('styles')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/select2/select2.min.css') }}">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/iCheck/all.css') }}"> 
<style>
	.user-create-form .form-group {
	  clear: both;
	  display: block;
	  float: left;
	  margin-bottom: 40px;
	  width: 100%;
	}
	.user-create-form .form-group > label {
	  color: #888;
	  float: left;
	  font-size: 20px;
	  font-weight: normal;
	  width: 35%;
	}
	.user-create-form .form-group .input-group {
	  float: left;
	  width: 65%;
	}
	.error-msg {
	  color: red;
	  display: inline-block;
	  padding: 5px 10px 5px 30px;
	  text-transform: capitalize;
	} 
	#multipleupload .dropzone {
	  border: 2px dashed #0087f7;
	  padding: 16px 20px;
	  text-align: center;
	}
	.form-group.user-thumb-group > label, 
	.form-group.user-thumb-group .input-group {
	  width: 100%;
	}
</style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create User
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create User</li>
      </ol>
    </section> 
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
			<!-- <pre>
			//print_r($errors); 
			</pre> -->
				<div class="box"> 
				{!! Form::open(['route' => 'user.create', 'class' => 'user-create-form']) !!} 
					<div class="box-header"> 
					</div>
					<!-- /.box-header --> 
					<div class="box-body">  
					<div class="col-md-7">
					
						<div class="form-group">
							<label>User Name:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" > 
							</div>
							@if($errors->first('name')) 
								<strong class="error-msg">{{ $errors->first('name') }} </strong> 
							@endif
							<!-- /.input group -->
						</div>
						<!-- /.form group -->  
						
						<div class="form-group">
							<label>User Email:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control" name="email">
							</div>
							@if($errors->first('email')) 
								<strong class="error-msg">{{ $errors->first('email') }} </strong> 
							@endif
							<!-- /.input group -->
						</div>
						<!-- /.form group -->  
						
						<div class="form-group">
							<label>User Password:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control" name="password">
							</div>
							@if($errors->first('password')) 
								<strong class="error-msg">{{ $errors->first('password') }} </strong> 
							@endif
							<!-- /.input group -->
						</div>
						<!-- /.form group --> 
						
						<div class="form-group">
							<label>Re-Password:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control" name="repassword">
							</div>
							@if($errors->first('repassword')) 
								<strong class="error-msg">{{ $errors->first('repassword') }} </strong> 
							@endif
							<!-- /.input group -->
						</div>
						<!-- /.form group --> 
						
						<div class="form-group">
							<label>User Rule:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<select class="form-control select2" name="rule" style="width: 100%;"> 
									@foreach($roles as $role)
										<option value="{{ $role->id }}">{{ $role->name }}</option> 
									@endforeach
								</select>
							</div>
							@if($errors->first('rule')) 
								<strong class="error-msg">{{ $errors->first('rule') }} </strong> 
							@endif
							<!-- /.input group -->
						</div>
						<!-- /.form group --> 
						
						<!-- phone mask -->
						<div class="form-group">
							<label> Phone:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" class="form-control" name="mobile">
							</div>
							@if($errors->first('mobile')) 
								<strong class="error-msg">{{ $errors->first('mobile') }} </strong> 
							@endif
							<!-- /.input group -->
						</div>
						<!-- /.form group --> 
						
						<div class="form-group">
							<label>User Address:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div> 
								<textarea class="form-control" name="address"></textarea>
							</div>
							@if($errors->first('address')) 
								<strong class="error-msg">{{ $errors->first('address') }} </strong> 
							@endif
							<!-- /.input group -->
						</div>
						<!-- /.form group --> 
						
						<div class="form-group">
							<label>User Acount Status:</label>

							<div class="input-group">
								<label>
								  <input type="radio" name="status" value="1" class="flat-red" checked>
								  Active
								</label>
								<label>
								  <input type="radio" name="status" value="0" class="flat-red">
								  Deactive
								</label>
							</div>
							@if($errors->first('status')) 
								<strong class="error-msg">{{ $errors->first('status') }} </strong> 
							@endif
							<!-- /.input group -->
						</div>
					
					</div>
					<div class="col-md-5">  
						<div class="form-group user-thumb-group">
							<label> User Thumb:</label> 
							<div class="input-group post-thumb-field"> 
								<div id="multipleupload" class="multipleupload" action="{{ route('upload.user.thumb') }}">
									<div class="dropzone"  >
										<div class="dz-message" >
											<img id="post-thumb-prev" src="" alt="" />
											<h3>Drop images here or click to upload.</h3>
										</div> 
									</div> 
								</div>
								<input id="post-thumb-input" type="hidden" class="form-control" name="picture" value="" >
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group --> 
					</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				{!! Form::close() !!}
				</div>
			</div>
		</div>
    </section>
    <!-- /.content -->

@stop
@section('scripts')  
<!-- Select2 -->
<script src="{{ asset('public/admin-assets/plugins/select2/select2.full.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('public/admin-assets/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('public/admin-assets/dist/js/dropzone.js') }}"></script>
<!-- page script -->
<script>
	//Initialize Select2 Elements
	$(".select2").select2();
	//Flat red color scheme for iCheck
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	  checkboxClass: 'icheckbox_flat-green',
	  radioClass: 'iradio_flat-green'
	});
</script>
<script>
 $(document).ready(function () {
	var actionUrl = $(".multipleupload").attr('data-action');
	Dropzone.autoDiscover = false;
	$("#multipleupload").dropzone( { 
		paramName: "picture",
		url: actionUrl, 
		uploadMultiple:false,
		previewsContainer: false,
		addRemoveLinks: true,
		sending: function(file, xhr, formData){
					formData.append( '_token', $("input[name=_token]").val() );
				},
		success: function(file, response, done){
			console.log("aaaaaaaaaaa"); 		
                    $("#multipleupload").parents('.post-thumb-field').find('#post-thumb-input').attr("value", response.imageName);
                    $("#multipleupload").parents('.post-thumb-field').find('#post-thumb-prev').attr("src", response.image);
                }
	});  
});
</script>
@stop