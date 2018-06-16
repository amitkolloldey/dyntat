@extends('admin.layouts.master')

@section('title') Edit Media @stop

@section('styles') 
<style> 
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
        Edit Media
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Media</li>
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
				{!! Form::open(['route' => 'media.update', 'class' => 'test-create-form']) !!} 
					<div class="box-header"> 
					</div>
					<!-- /.box-header --> 
					<div class="box-body">
					@foreach($Medias as $Media)
						<input type="hidden" name="mediaId" value="{{ $Media->id }}" />
						<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label>Test Name:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control" name="title" value="{{ $Media->title }}" > 
								</div>
								@if($errors->first('title')) 
									<strong class="error-msg">{{ $errors->first('title') }} </strong> 
								@endif
								<!-- /.input group -->
							</div>
							<!-- /.form group --> 


							<div class="form-group">
								<label>Video URL:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control" name="url" value="{{ $Media->url }}" > 
								</div>
								@if($errors->first('url')) 
									<strong class="error-msg">{{ $errors->first('url') }} </strong> 
								@endif
								<!-- /.input group -->
							</div>
							<!-- /.form group --> 

							<!--
							<div class="form-group">
								<label>Message:</label>

								<div class="input-group"> 
									<textarea rows="10" class="form-control test-content" name="message">{-{ $-partner->message }-}</textarea>
								</div>  
							</div>
							<!-- /.form group -->    
						</div>
						<div class="col-md-5">   
						</div>
						</div>
					@endforeach
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