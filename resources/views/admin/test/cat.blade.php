@extends('admin.layouts.master')

@section('title') Categorys @stop

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
</style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categorys 
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categorys</li>
      </ol>
    </section> 
    <!-- Main content --> 
        <section class="content">
          <div class="row">
			<div class="col-md-4">
				<div class="box">
					<div class="box-body">  
						@if (Route::currentRouteName() == 'cats.edit') 					
							{!! Form::open(['route' => 'cats.update', 'class'=>'form-horizontal form-bordered' ]) !!}
						@else
							{!! Form::open(['route' => 'cats.create', 'class'=>'form-horizontal form-bordered' ]) !!}
						@endif
							<!-- Page Title -->
							@if (Route::currentRouteName() == 'cats.edit') 
								@foreach($cats as $cat)
								<input type="hidden" name="catName" value="{{ $cat->id }}" />
								<div class="form-group">
									<label for="cat name" class="col-sm-2 control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px;">Category name</label>
									<div class="col-sm-10"> 
											<input type="text" class="form-control" name="name" value="{{ $cat->name }}" placeholder="Enter the Category title...">
									</div>
									@if($errors->first('name')) 
										<strong class="error-msg">{{ $errors->first('name') }} </strong> 
									@endif
								</div>
								@endforeach
							@else
							<div class="form-group">
								<label for="cat name" class="col-sm-2 control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px;">Category name</label>
								<div class="col-sm-10"> 
										<input type="text" class="form-control" name="name" placeholder="Enter the Category title...">
								</div>
								@if($errors->first('name')) 
									<strong class="error-msg">{{ $errors->first('name') }} </strong> 
								@endif
                            </div>
							@endif
							
							<div class="form-group form-actions">
								<div class="col-sm-10 col-sm-offset-2">
								@if (Route::currentRouteName() == 'cats.edit') 
									<button type="submit" id="add" class="btn btn-info">Update</button>
								@else
									<button type="submit" id="add" class="btn btn-info">ADD</button>
								@endif
								
								</div>
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
                            <th>Category name</th>
                            <th>Created Time</th>
                            <th>Updated Time</th> 
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
					<tbody> 
						@foreach($cats as $cat)
						<tr>
                            <th>{{ $cat->id }}</th>  
                            <th>{{ $cat->name }}</th>  
                            <th>{{ $cat->created_at }}</th>  
                            <th>{{ $cat->updated_at }}</th>  
                            <th> 
								@if (Route::currentRouteName() != 'cats.edit')
								<a href="{{ route('cats.edit', array($cat->id)) }}" class="btn btn-app" >
									<i class="fa fa-edit"></i>
									Edit
								</a>
								@endif
								<a href="{{ route('cats.delete', array($cat->id)) }}" class="btn btn-app" >
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
                            <th>Category name</th>
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
		$('#example2').DataTable({
		  "paging": true,
		  "lengthChange": false,
		  "searching": false,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});
	  });
	</script> 
@stop