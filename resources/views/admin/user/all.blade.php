@extends('admin.layouts.master')

@section('title') All User @stop

@section('styles') 
<style>
	.admin-thumb{
		width: 50px;
	}
</style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			All User 
		</h1>
      	<ol class="breadcrumb">
    		<li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    		<li class="active">All User</li>
      	</ol>
    </section> 
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header"> 
					</div>
					<!-- /.box-header -->
					<div class="box-body">  
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Thumb</th> 
									<th>Name</th> 
									<th>Email</th> 
									<th>Phone</th> 
									<th>Role</th> 
									<th>Status</th>
									@if(Auth::user()->hasAnyRole('Admin'))
									<th>Action</th> 
									@endif
								</tr>
							</thead> 
							<tbody>  
								@foreach($users as $user)
								<tr>
									<td> {{ $user->id }} </td>
									<td>  
										@if($userImg = json_decode($user->picture))
											<img class="admin-thumb" src="{{ adminUrl($userImg->thumb) }}" /> 
										@endif
									</td> 
									<td>{{ $user->name }}</td> 
									<td>{{ $user->email }}</td> 
									<td>{{ $user->mobile }}</td> 
									<td>
										@foreach($user->roles as $role)
											{{ $role->name }},
										@endforeach
									</td> 
									<td>
										@if($user->status == '1')
											Active
										@else
											Deactive
										@endif 
									</td>
									@if(Auth::user()->hasAnyRole('Admin'))
									<td>
										<a href="{{ route('user.edit', array($user->id)) }}" class="btn btn-app" >
										<i class="fa fa-edit"></i>
										Edit
										</a>
										<a href="{{ route('user.delete', array($user->id)) }}" class="btn btn-app" >
											<i class="fa fa-trash-o"></i>
											Delete
										</a>
									</td>
									@endif
								</tr> 
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Thumb</th> 
									<th>Name</th> 
									<th>Email</th> 
									<th>Phone</th> 
									<th>Role</th> 
									<th>Status</th>
									@if(Auth::user()->hasAnyRole('Admin'))
									<th>Action</th> 
									@endif
								</tr>
							</tfoot>
						</table>
					</div>
				<!-- /.box-body -->
				</div>
			</div>
		</div>
    </section>
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