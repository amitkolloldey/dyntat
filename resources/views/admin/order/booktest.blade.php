@extends('admin.layouts.master') 

@section('title') Book Test Detiels @stop

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
        Book Test Detiels 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Book Test Detiels</li>
      </ol>
    </section> 
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Book Test Detiels</h3>
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
								</tr>
							</thead> 
							<tbody>   
								<tr> 
									<td>{{ $testall->id }}</td> 
									<td>{{ $testall->name }}</td> 
									<td>{{ $testall->email }}</td> 
									<td>{{ $testall->address }}</td> 
									<td>{{ $testall->mobile }}</td> 
									<td>{{ $testall->created_at }}</td>   
								</tr>  
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

			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Book Test Detiels</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">  
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr> 
									<th colspan="6" class="table-name">Test Or Health List</th> 
								</tr> 
								<tr> 
									<th>ID</th>   
									<th>Test Image</th>   
									<th>Test Title</th>    
									<th>Test Short Name</th>   
									<th>Regular Price</th>   
									<th>Sale Price</th>   
								</tr>
							</thead> 
							<tbody>
								@if( $testall ) 
									@foreach($testall->tests as $test)  
										<tr>    
											<td>{{ $test->id }}</td> 
											<td>
											@if( $testimg = json_decode($test->picture) )
												<img src="{{  adminUrl($testimg->thumb) }}" alt="" width="150px">
											@endif
											</td>
											<td>{{ $test->title }}</td> 
											<td>{{ $test->short_name }}</td> 
											<td>{{ $test->price }}</td>   
											<td>{{ $test->sale_price }}</td> 
										</tr> 
									@endforeach
								@endif
							</tbody>
							<tfoot>
								<tr> 
									<th>ID</th>   
									<th>Test Image</th>   
									<th>Test Type</th>   
									<th>Test Name</th>   
									<th>Test Short Name</th>   
									<th>Price</th>   
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
        <h3> Are You Sure? You Want To Cancel This Order &hellip;</h3>
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