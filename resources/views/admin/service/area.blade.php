@extends('admin.layouts.master')

@section('title') Service Locations Areas @stop

@section('styles') 
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
        Service Locations Areas
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Service Locations Areas</li>
      </ol>
    </section> 
    <!-- Main content --> 
        <section class="content">
          <div class="row">
			<div class="col-md-4">
				<div class="box">
					<div class="box-body">  
						@if (Route::currentRouteName() == 'serviceArea.edit')
							{!! Form::open(['route' => 'serviceArea.update', 'class'=>'form-horizontal form-bordered' ]) !!}
						@else
							{!! Form::open(['route' => 'serviceArea.create', 'class'=>'form-horizontal form-bordered' ]) !!}
						@endif
							<!-- Page Title -->
							@if (Route::currentRouteName() == 'serviceArea.edit') 
								@foreach($serviceAreas as $ServiceArea)
								<input type="hidden" name="ServiceAreaID" value="{{ $ServiceArea->id }}" />
								<div class="form-group no-margin">
									<label >Service Area name</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control" name="name" value="{{ $ServiceArea->name }}" placeholder="Enter The Service Area name...">
									</div>
									@if($errors->first('name')) 
										<strong class="error-msg">{{ $errors->first('name') }} </strong> 
									@endif
								</div>
								@endforeach
							@else
							<div class="form-group no-margin">
								<label >Service Area name</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control" name="name" placeholder="Enter The Service Area name...">
								</div>
								@if($errors->first('name')) 
									<strong class="error-msg">{{ $errors->first('name') }} </strong> 
								@endif
                            </div>
							@endif
							
							<div class="form-group form-actions no-margin"> 
								@if (Route::currentRouteName() == 'serviceArea.edit') 
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
						@foreach($serviceAreas as $ServiceArea)
						<tr>
                            <th>{{ $ServiceArea->id }}</th>  
                            <th>{{ $ServiceArea->name }}</th>  
                            <th>{{ $ServiceArea->created_at }}</th>  
                            <th>{{ $ServiceArea->updated_at }}</th>  
                            <th> 
								@if (Route::currentRouteName() != 'serviceArea.edit')
								<a href="{{ route('serviceArea.edit', array($ServiceArea->id)) }}" class="btn btn-app" >
									<i class="fa fa-edit"></i>
									Edit
								</a>
								@endif
								<a href="{{ route('serviceArea.delete', array($ServiceArea->id)) }}" class="btn btn-app" >
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
<!-- page script -->
<script>
	$(function () { 
		$('#example2').DataTable();
	});
</script>
@stop