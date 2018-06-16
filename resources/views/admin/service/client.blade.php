@extends('admin.layouts.master')

@section('title') Service Locations Clients @stop

@section('styles') 
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/select2/select2.min.css') }}">
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
	  width: 20%;
	}
	.user-create-form .form-group .input-group {
	  float: left;
	  width: 40%;
	}
	.error-msg {
	  color: red;
	  display: inline-block;
	  padding: 5px 10px 5px 30px;
	  text-transform: capitalize;
	} 
	.form-horizontal .form-group.no-margin {
	  margin-bottom: 20px !important;
	  margin-left: 0 !important;
	  margin-right: 0 !important;
	}
</style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
	    <h1>
	        Service Locations Clients
	    </h1>
    	<ol class="breadcrumb">
        	<li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li class="active">Service Locations Clients</li>
    	</ol>
    </section> 
    <!-- Main content --> 
        <section class="content">
          <div class="row">
			<div class="col-md-4">
				<div class="box">
					<div class="box-body">  
						@if (Route::currentRouteName() == 'serviceClient.edit') 					
							{!! Form::open(['route' => 'serviceClient.update', 'class'=>'form-horizontal form-bordered' ]) !!}
						@else
							{!! Form::open(['route' => 'serviceClient.create', 'class'=>'form-horizontal form-bordered' ]) !!}
						@endif
							<!-- Page Title -->
							@if (Route::currentRouteName() == 'serviceClient.edit') 
								@foreach($ServiceClients as $ServiceClient)
								<input type="hidden" name="ServiceClientID" value="{{ $ServiceClient->id }}" />
								<div class="form-group no-margin">
									<label>Service Client name</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control" name="name" value="{{ $ServiceClient->name }}" placeholder="Enter the Category title...">
									</div>
									@if($errors->first('name')) 
										<strong class="error-msg">{{ $errors->first('name') }} </strong> 
									@endif
								</div>
								<div class="form-group no-margin">
									<label>Select Service Area :</label>

									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select class="form-control select2" name="serviceAreas_id" style="width: 100%;"> 
											@foreach($ServiceAreas as $ServiceArea)  
												<option value="{{ $ServiceArea->id }}" @if($ServiceClient->serviceAreas_id == $ServiceArea->id) selected @endif>{{ $ServiceArea->name }}</option>  
											@endforeach
										</select>
									</div> 
									<!-- /.input group -->
								</div>
								<!-- /.form group --> 
								@endforeach
							@else
							<div class="form-group no-margin">
								<label>Service Client name</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div> 
									<input type="text" class="form-control" name="name" placeholder="Enter The Service Client Name...">
								</div> 
								@if($errors->first('name')) 
									<strong class="error-msg">{{ $errors->first('name') }} </strong> 
								@endif
                            </div>
							<div class="form-group no-margin">
								<label>Select Service Area :</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<select class="form-control select2" name="serviceAreas_id" style="width: 100%;"> 
										@foreach($ServiceAreas as $ServiceArea)  
											<option value="{{ $ServiceArea->id }}">{{ $ServiceArea->name }}</option>  
										@endforeach
									</select>
								</div>
								@if($errors->first('rule')) 
									<strong class="error-msg">{{ $errors->first('rule') }} </strong> 
								@endif
								<!-- /.input group -->
							</div>
							<!-- /.form group --> 
							@endif
							
							<div class="form-group form-actions no-margin"> 
								@if (Route::currentRouteName() == 'serviceClient.edit') 
									<button type="submit" id="add" class="btn btn-info">Update</button>
								@else
									<button type="submit" id="add" class="btn btn-info">ADD</button>
								@endif 
							</div>
						{!! Form::close() !!}
					</div>
					<!-- /.box-body -->

				</div><!-- /.box -->
			</div>
            <!-- right column -->
            <div class="col-md-8">
              <!-- Horizontal Form -->
              <div class="box">
                <div class="box-body"> 
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Service Area name</th>
                            <th>Created Time</th>
                            <th>Updated Time</th> 
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
					<tbody> 
						@foreach($ServiceClients as $ServiceClient)
						<tr>
                            <th>{{ $ServiceClient->id }}</th>  
                            <th>{{ $ServiceClient->name }}</th>  
                            <th>{{ $ServiceClient->created_at }}</th>  
                            <th>{{ $ServiceClient->updated_at }}</th>  
                            <th> 
								@if (Route::currentRouteName() != 'serviceClient.edit')
								<a href="{{ route('serviceClient.edit', array($ServiceClient->id)) }}" class="btn btn-app" >
									<i class="fa fa-edit"></i>
									Edit
								</a>
								@endif
								<a href="{{ route('serviceClient.delete', array($ServiceClient->id)) }}" class="btn btn-app" >
									<i class="fa fa-trash-o"></i>
									Delete
								</a> 
							</th>
                        </tr>
						@endforeach
					</tbody> 
					<tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>Service Area name</th>
                            <th>Created Time</th>
                            <th>Updated Time</th> 
                            <th class="text-center">Options</th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->

              </div><!-- /.box -->

            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content   where('id', $id) -->
	<!-- /.content -->

@stop
@section('scripts')   
<!-- Select2 -->
<script src="{{ asset('public/admin-assets/plugins/select2/select2.full.min.js') }}"></script>
<script>
$(function () { 
	//Initialize Select2 Elements
	$(".select2").select2();
/*	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});*/
});
</script> 
@stop