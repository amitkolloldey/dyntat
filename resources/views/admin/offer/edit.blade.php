@extends('admin.layouts.master')

@section('title') Edit Offer @stop

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
        Edit Offer
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Offer</li>
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
				{!! Form::open(['route' => 'offer.update', 'class' => 'test-create-form']) !!} 
					<div class="box-header"> 
					</div>
					<!-- /.box-header --> 
					<div class="box-body">
					@foreach($Offers as $Offer)
						<input type="hidden" name="offerId" value="{{ $Offer->id }}" />
						<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Offer Title:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control" name="title" value="{{ $Offer->title }}" >
								</div>
								@if($errors->first('title')) 
									<strong class="error-msg">{{ $errors->first('title') }} </strong> 
								@endif
								<!-- /.input group -->
							</div>
							<!-- /.form group -->
							<div class="form-group">
								<label>Meta Description:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control" name="meta_description" value="{{ $Offer->meta_description }}" >
								</div>
								@if($errors->first('meta_description'))
									<strong class="error-msg">{{ $errors->first('meta_description') }} </strong>
							@endif
							<!-- /.input group -->
							</div>
							<div class="form-group">
								<label>Offer Detiels:</label>

								<div class="input-group"> 
									<textarea rows="10" class="form-control test-content" name="content">{{ $Offer->content }}</textarea>
								</div>  
							</div>
							<!-- /.form group -->   
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Offer Thumb:</label> 
								<div class="input-group post-thumb-field"> 
									<div id="multipleupload" class="multipleupload" action="{{ route('upload.offer.thumb') }}">
										<div class="dropzone"  >
											<div class="dz-message" >
												<img id="post-thumb-prev" src="{{ adminUrl($Offer->thumb) }}" alt="" />
												<h3>Drop images here or click to upload.</h3>
											</div> 
										</div> 
									</div>
									<input id="post-thumb-input" type="hidden" class="form-control" name="thumb" value="{{$Offer->thumb}}" >
								</div>
								<!-- /.input group -->
							</div>
							<!-- /.form group -->   
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
<script src="{{ asset('/public/tinymce/4.7.1/js/tinymce/tinymce.min.js') }}"></script>

<script>

    tinymce.init({
        selector: 'textarea',
        height: 300,
        menubar: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help'
        ],
        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'],
        file_browser_callback: function(field, url, type, win) {

            tinyMCE.activeEditor.windowManager.open({
                file: '/public/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                title: 'KCFinder',
                width: 700,
                height: 500,
                inline: true,
                close_previous: true
            }, {
                window: win,
                input: field
            });
            return false;
        }
    });
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
                    $("#multipleupload").parents('.post-thumb-field').find('#post-thumb-input').attr("value", response.imageName);
                    $("#multipleupload").parents('.post-thumb-field').find('#post-thumb-prev').attr("src", response.image);
                }
	});  
});
</script>
@stop