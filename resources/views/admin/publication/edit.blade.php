@extends('admin.layouts.master')

@section('title') Edit Publication @stop

<link rel="stylesheet" href="{{ asset('public/admin-assets/dist/css/uploadfile.css') }}">  
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
	.book-form .book-pages {
	  display: block;
	  float: left;
	  margin-bottom: 30px;
	  margin-top: 20px;
	  width: 100%;
	}
	.book-pages .book-page {
	  border-bottom: 1px solid #888;
	  display: block;
	  float: left;
	  margin-bottom: 25px;
	  padding-bottom: 25px;
	  width: 100%;
	}

	.book-pages .book-page .page-field{
		float: left;
		width: 48%;
	}
	.book-pages .book-page .page-img-prev{
		float: right;
		width: 48%;
		overflow: hidden;
	}
	.book-pages .book-page .page-img-prev img{
		width: 100%;
		max-height: 300px;
	}
	.book-page .page-name, .book-page .page-img {
	  margin-right: 20px;
	  width: 100%;
	}
	.book-page .page-img .pageimage .ajax-upload-dragdrop {
	  align-items: center;
	  display: flex;
	  height: 112px;
	  justify-content: center;
	  width: 100% !important;
	} 
	.book-page .page-name {
	  margin-bottom: 30px;
	}
	.page-img .form-group {
	  margin-bottom: 0;
	}
	.ajax-file-upload-container {
	  margin: 0px 0;
	}
</style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Publication
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Publication</li>
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
				{!! Form::open(['route' => 'publication.update', 'class' => 'test-create-form']) !!} 
					<div class="box-header"> 
					</div>
					<!-- /.box-header --> 
					<div class="box-body"> 
					@foreach($Publications as $Publication)	
						<input type="hidden" name="publicationId" value="{{ $Publication->id }}" />
						<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Publication Name:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control" name="name" value="{{$Publication->name}}" > 
								</div> 
								<!-- /.input group -->
							</div>
							<!-- /.form group -->
							<div class="form-group">
								<label>Meta Description:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control" name="meta_description" value="{{$Publication->meta_description}}" >
								</div>
								<!-- /.input group -->
							</div>
							
							<div class="form-group">
								<label>Publication Date:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control" name="date" value="{{$Publication->date}}" > 
								</div> 
								<!-- /.input group -->
							</div>  
							<!-- /.form group --> 
							<div class="book-form" data-page-url="{{route('upload.bookpage.img')}}">
								<div class="book-pages">
								@if($book = json_decode($Publication->book))
									@foreach($book as $page)
									<div class="book-page">
										<div class="page-field">
										<div class="page-name">
											<div class="form-group">
												<label>Book Page Name</label> 
												<div class="input-group"> 
													<input type="text" class="form-control" name="pageName[]" value="{{$page->pageName}}" > 
												</div> 
												<!-- /.input group -->
											</div>
										</div>
										<div class="page-img">
											<div class="form-group">
												<label> Book Page Image:</label> 
												
												<div class="input-group"> 
													<div class="pageimage">
														<div class="dropzone"  >
															<div class="dz-message" >
																<img class="book-page-prev" src="" alt="" />
																<h3>Drop images here or click to upload.</h3>
															</div> 
														</div> 
													</div>
													<input type="hidden" class="form-control book-img-input" name="pageImage[]" value="{{$page->pageImage}}" >
												</div>
												<!-- /.input group -->
											</div>
										</div>
										</div>
										<div class="page-img-prev">
											<img class="book-img-prev" src="{{adminUrl($page->pageImage)}}" alt="">
										</div>
									</div>
									@endforeach
								@endif
								</div>
								<div class=""><a href="" class="btn btn-primary addPageField">Add Page</a></div>
							</div>
							
						</div>
						<div class="col-md-4">  
							<div class="form-group">
								<label> Book Thumb:</label> 
								
								<div class="input-group post-thumb-field"> 
									<div id="multipleupload" class="multipleupload" action="{{ route('upload.book.thumb') }}">
										<div class="dropzone"  >
											<div class="dz-message" >
												<img id="post-thumb-prev" src="{{ adminUrl($Publication->thumb) }}" alt="" />
												<h3>Drop images here or click to upload.</h3>
											</div> 
										</div> 
									</div>
									<input id="post-thumb-input" type="hidden" class="form-control" name="thumb" value="{{$Publication->thumb}}" >
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
<script src="{{ asset('public/admin-assets/dist/js/jquery.uploadfile.js') }}"></script> 
<!-- page script -->
<script> 
$(document).ready(function () {
	var actionUrl = $(".multipleupload").attr('data-action');
	Dropzone.autoDiscover = false; 
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
	
	
	$(".pageimage").each(function (){
		var currntBel = $(this);
		var imgUrl = $(this).parents(".book-form").data("page-url");
		var token = $("input[ name=_token]").val();
		$(this).uploadFile({
			url: imgUrl, 
			fileName:"pageImg", 
			formData: {"_token":token},
			statusbar: false, 
			showStatusAfterSuccess: false, 
			onSuccess:function(files,data,xhr,pd){ 
				currntBel.parent(".input-group").find(".book-img-input").val(data.imageName);
				currntBel.parents(".book-page").find(".book-img-prev").attr("src", data.image);
			}
		});
	});
	var pageHtml = "";
		pageHtml += "<div class='book-page'><div class='page-field'><div class='page-name'><div class='form-group'><label>Book Page Name</label><div class='input-group'><input type='text' class='form-control' name='pageName[]' value='' ></div></div></div>";
		pageHtml += "<div class='page-img'><div class='form-group'><label>Book Page Image:</label><div class='input-group'><div class='pageimage'></div><input type='hidden' class='form-control book-img-input' name='pageImage[]' value='' ></div></div></div></div>";
		pageHtml += "<div class='page-img-prev'  ><img class='book-img-prev' src='' alt='' /></div></div>";		
	$(".addPageField").on('click', function(event){
		event.preventDefault();
		$(this).parents(".book-form").find(".book-pages").append(pageHtml); 
		$(".pageimage").each(function () {
			var currntBel = $(this);
			var imgUrl = $(this).parents(".book-form").data("page-url");
			var token = $("input[ name=_token]").val();
			$(this).uploadFile({
				url: imgUrl, 
				fileName:"pageImg", 
				formData: {"_token":token}, 
				statusbar: false, 
				showStatusAfterSuccess: false, 
				onSuccess:function(files,data,xhr,pd){ 
					currntBel.parent(".input-group").find(".book-img-input").val(data.imageName);
					currntBel.parents(".book-page").find(".book-img-prev").attr("src", data.image);
				}
			});
		});
	});
});
</script>
@stop