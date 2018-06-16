@extends('admin.layouts.master')

@section('title') Orders @stop

@section('styles')
    <style>
        .admin-thumb {
            width: 50px;
        }
    </style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Temporary Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Temporary Orders</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Temporary Orders</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Information</th>
                                <th>Order Information</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_null($tempOrders))
                                @foreach($tempOrders as $Order)
                                    <tr>
                                        <td>{{ $Order->id }}</td>


                                        <td>{!! $Order->user_info  !!}</td>


                                        <td>{{ $Order->order_details }}</td>


                                        @if(is_null($Order->updated_at))
                                            <td>{{ $Order->created_at }}</td>
                                        @else
                                            <td>{{ $Order->updated_at }}</td>
                                        @endif

                                        <td>{{ $Order->status }}</td>
                                        <td>
                                            <a class="btn btn-app"
                                               href="{{route('temp.order.cancel', array($Order->id))}}">
                                                <i class="fa fa-edit"></i>
                                                Cancel
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>User Information</th>
                                <th>Order Information</th>
                                <th>Date</th>
                                <th>Status</th>
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
                "order": [[0, "desc"]]
            });
            $('[data-toggle="modal"]').on('click', function () {
                var url = $(this).data('url');
                $('.calcelConfirm').attr('href', url);
            });
        });
    </script>

@stop