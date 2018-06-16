@extends('admin.layouts.master') 

@section('title') Book Test List @stop

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
        Book Test List 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Book Test List</li>
      </ol>
    </section> 
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Book Test List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">  
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr> 
									<th>ID</th>    
									<th>User Name</th>    
									<th>User Email</th>    
									<th>Mobile</th>    
									<th>Address</th>    
									<th>Date</th>     
									<th>Action</th>   
								</tr>
							</thead> 
							<tbody>  
							
								@foreach($testall as $test) 
								<tr> 
									<td>{{ $test->id }}</td> 
									<td>{{ $test->name }}</td> 
									<td>{{ $test->email }}</td> 
									<td>{{ $test->address }}</td> 
									<td>{{ $test->mobile }}</td> 
									<td>{{ $test->created_at }}</td>  
									<td> 
										<a class="btn btn-app" href="{{route('booktest.single', array($test->id))}}">
											<i class="fa fa-edit"></i>
											View Detiels
										</a> 

										<!--
										<a class="btn btn-app" href="{{route('order.processing.up', array($test->id))}}">
											<i class="fa fa-edit"></i>
											Delete
										</a>  
										--> 
									</td> 
								</tr> 
								@endforeach
							</tbody>
							<tfoot>
								<tr> 
									<th>ID</th>    
									<th>User Name</th>    
									<th>User Email</th>    
									<th>Mobile</th>    
									<th>Address</th>   
									<th>Date</th>     
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

<div class="modal fade orderCancel" role="dialog" aria-labelledby="orderCancel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cancel Modal</h4>
      </div>
      <div class="modal-body">
        <h3> Are You Sure? You Want To Cancel This Order &hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <a href="" class="btn btn-primary calcelConfirm">Save changes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop
@section('scripts') 
<!-- page script -->
<script>
	$(function () { 
		$('#example2').DataTable({
        	"order": [[ 0, "desc" ]]
    	});
    	$('[data-toggle="modal"]').on('click', function(){
		  var url = $(this).data('url');
		  $('.calcelConfirm').attr('href', url);
		});
	});
</script> 

@stop