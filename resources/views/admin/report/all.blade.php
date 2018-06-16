@extends('admin.layouts.master')

@section('title') All Reports @stop

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
        All Reports
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Reports</li>
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
									<th>Order ID</th>  
									<th>Customer Name</th>
									<th>Mobile</th>
									<th>Created At</th>
									<th>Updated At</th> 
									<th>Action</th> 
								</tr>
							</thead> 
							<tbody>  
								@foreach($Reports as $Report)
								<tr>
									<td> {{ $Report->id }} </td>
									<td> {{ $Report->order_id }} </td>
									<td> {{ $Report->order->user->name }} </td>
									<td> {{ $Report->order->user->mobile }} </td>
									<td> {{ $Report->created_at }} </td>
									<td> {{ $Report->updated_at }} </td>
									<td>
										<a class="btn btn-app" href="{{route('report.edit', array($Report->id))}}">
											<i class="fa fa-edit"></i>
											View Details
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Order ID</th>
									<th>Customer Name</th>
									<th>Mobile</th>
									<th>Created At</th> 
									<th>Updated At</th> 
									<th>Action</th> 
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