@extends('admin.layouts.master')
<!-- mmmmmmmmmmmmmmmmm -->
@section('title') Dashboard @stop

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
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> 
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Customer Message</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">  
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr> 
									<th>First Name</th>    
									<th>Last Name</th>    
									<th>Register As</th>    
									<th>Mobile</th>    
									<th>Email</th>    
									<th>Qualification</th>    
									<th>Specialization</th>    
									<th>phone</th>    
									<th>Home Address</th>    
									<th>Chamber Address</th>    
								</tr>
							</thead> 
							<tbody>  
							
								@foreach($customers as $customer) 
								<tr> 
									<td>{{ $customer->firstname }}</td> 
									<td>{{ $customer->lastname }}</td> 
									<td>{{ $customer->registerAs }}</td> 
									<td>{{ $customer->mobile }}</td> 
									<td>{{ $customer->email }}</td> 
									<td>{{ $customer->qualification }}</td> 
									<td>{{ $customer->specialization }}</td> 
									<td>{{ $customer->phone }}</td> 
									<td>{{ $customer->homeAddress }}</td> 
									<td>{{ $customer->chamberAddress }}</td> 
								</tr> 
								@endforeach
							</tbody>
							<tfoot>
								<tr> 
									<th>First Name</th>    
									<th>Last Name</th>    
									<th>Register As</th>    
									<th>Mobile</th>    
									<th>Email</th>    
									<th>Qualification</th>    
									<th>Specialization</th>    
									<th>phone</th>    
									<th>Home Address</th>    
									<th>Chamber Address</th>    
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