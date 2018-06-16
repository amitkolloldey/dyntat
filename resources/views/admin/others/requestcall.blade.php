@extends('admin.layouts.master')

@section('title') Book Test Detiels @stop

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
            Book Test Detiels
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Request Call</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Request Call</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Contact Number</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requestCalls as $i=>$requestCall)
                                <tr>
                                    <td>{{ $requestCall->id }}</td>
                                    <td>{{ $requestCall->number }}</td>
                                    <td>{{ $requestCall->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
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