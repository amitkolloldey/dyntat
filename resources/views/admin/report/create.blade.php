@extends('admin.layouts.master')

@section('title') Create Report @stop
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/select2/select2.min.css') }}">
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
        Create Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Report</li>
      </ol>
    </section> 
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12"> 
				<div class="box"> 
				{!! Form::open(['route' => 'report.create', 'class' => 'test-create-form']) !!} 
					<div class="box-header"> 
					</div>
					<!-- /.box-header --> 
					<div class="box-body">  
						<div class="row">
							<div class="col-md-8">
								<div class="form-group order-id-warp" data-selurl="{{route('get.Oder.Detiels')}}">
									<label>Select Processing Order Id:</label>

									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select class="form-control order-id" name="order_id" style="width: 100%;"> 
											<option>Select Order ID</option> 
											@foreach($orders as $order)
												<option value="{{ $order->id }}">{{ $order->id }}</option> 
											@endforeach
										</select>
									</div> 
									<!-- /.input group -->
								</div>
								<!-- /.form group --> 

								<div class="book-form" data-page-url="{{route('upload.test.report')}}">
									<div class="book-pages"> 
									</div> 
								</div>
								
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
<!-- Select2 -->
<script src="{{ asset('public/admin-assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('public/admin-assets/dist/js/dropzone.js') }}"></script> 
<script src="{{ asset('public/admin-assets/dist/js/jquery.uploadfile.js') }}"></script> 
<!-- page script -->
<script> 
$(document).ready(function () {
	//Initialize Select2 Elements
	
	/*var actionUrl = $(".multipleupload").attr('data-action'); 
	
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
				//currntBel.parents(".book-page").find(".book-img-prev").attr("src", data.image);
			}
		});
	}); */


	$(".order-id").select2().on('change', function(){
		var parel = $(this).parents('.order-id-warp'), 
			selurl = parel.data('selurl'), 
			token = $("input[ name=_token]").val();  
		$.ajax({
			method	: "POST",
		  	url		: selurl, 
		  	data 	: { '_token':token, 'orderId': this.value },
		  	success : function(response){
		  		if (response.status == true) {
		  			$(".book-form").find(".book-pages").find(".book-page").remove();
		  			for (var i = 0; i < response.data.length; i++) { 
		  				var pageHtml = "";
						pageHtml += "<div class='book-page'><div class='page-field'>";

						pageHtml += "<div class='page-img'><div class='form-group'><label> Report For "+response.data[i]['name']+"</label><div class='input-group'><div class='pageimage'></div><input type='text' class='form-control book-img-input' name='testReports["+response.data[i]['id']+"]' value='' readonly ></div></div></div></div>";
						pageHtml += "<div class='page-img-prev'  ><img class='book-img-prev' src='' alt='' /></div></div>";	
						$(".book-form").find(".book-pages").append(pageHtml);
					}
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
								//currntBel.parents(".book-page").find(".book-img-prev").attr("src", data.image);
							}
						});
					});
		  		}
		  	}
		})
	});
});
</script>
@stop