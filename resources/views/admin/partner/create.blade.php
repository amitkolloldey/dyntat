@extends('admin.layouts.master')

@section('title') Create Partner @stop

@section('styles')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/select2/select2.min.css') }}">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/iCheck/all.css') }}">  
<style>
	/*
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
	  width: 20%;
	}
	.user-create-form .form-group .input-group {
	  float: left;
	  width: 40%;
	}
	*/
	.test-create-form .form-group, .test-create-form .input-group {
	  width: 100%;
	}
	.test-create-form .cats-list-checkbox {
	  display: block;
	  max-height: 400px;
	  overflow-x: auto;
	  overflow-y: scroll;
	  width: 100%;
	}
	.test-create-form .cats-list-checkbox > label {
	  display: block;
	  padding: 5px;
	  width: 100%;
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
</style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Partner
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Partner</li>
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
				{!! Form::open(['route' => 'partner.create', 'class' => 'test-create-form']) !!} 
					<div class="box-header"> 
					</div>
					<!-- /.box-header --> 
					<div class="box-body">  
						<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label>Test Name:</label>

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
								<label>Test Content:</label>

								<div class="input-group"> 
									<textarea rows="10" class="form-control test-content" name="message"></textarea>
								</div> 
								<!-- /.input group -->
							</div>
							<!-- /.form group -->  
						</div>
						<div class="col-md-5">  
							<div class="form-group">
								<label> Test Thumb:</label> 
								
								<div class="input-group post-thumb-field"> 
									<div id="multipleupload" class="multipleupload" action="{{ route('upload.partner.thumb') }}">
										<div class="dropzone"  >
											<div class="dz-message" >
												<img id="post-thumb-prev" src="" alt="" />
												<h3>Drop images here or click to upload.</h3>
											</div> 
										</div> 
									</div>
									<input id="post-thumb-input" type="hidden" class="form-control" name="thumb" value="" >
								</div>
								<!-- /.input group -->
							</div>
							<!-- /.form group --> 
						</div>
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

<script src="{{ asset('public/admin-assets/dist/js/dropzone.js') }}"></script> 
<!-- page script -->
<script> 
$(document).ready(function () {
	var actionUrl = $(".multipleupload").attr('data-action');
	Dropzone.autoDiscover = false;
	$("#multipleupload").dropzone( { 
		paramName: "thumb",
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