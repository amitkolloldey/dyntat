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
            Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Orders</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Orders</h3>
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
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_null($Orders))
                                {{--var_dump($Orders)--}}
                                @foreach($Orders as $Order)
                                    <tr>
                                        <td>{{ $Order->id }}</td>


                                            <td>{{ $Order->user->name }}</td>



                                            <td>{{ $Order->user->email }}</td>



                                            <td>{{ $Order->user->mobile }}</td>


                                        <td>{{ $Order->created_at }}</td>

                                        <td>
                                            @if( !empty($Order->status))
                                                <span class="label label-warning">{{ $Order->status }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if(Route::currentRouteName() == 'order.panding')
                                                <a class="btn btn-app"
                                                   href="{{route('order.panding.up', array($Order->id))}}">
                                                    <i class="fa fa-edit"></i>
                                                    Order Process
                                                </a>
                                                <button type="button"
                                                        data-url="{{route('order.panding.cencel', array($Order->id))}}"
                                                        class="btn btn-app" data-toggle="modal"
                                                        data-target=".orderCancel">
                                                    <i class="fa fa-edit"></i>
                                                    Order Cancel
                                                </button>
                                            @elseif(Route::currentRouteName() == 'order.processing')
                                                <a class="btn btn-app"
                                                   href="{{route('order.processing.up', array($Order->id))}}">
                                                    <i class="fa fa-edit"></i>
                                                    ADD
                                                </a>
                                            @else
                                                <a class="btn btn-app" href="{{route('order', array($Order->id))}}">
                                                    <i class="fa fa-edit"></i>
                                                    View Ditels
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Mobile</th>
                                <th>Email</th>
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