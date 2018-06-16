@extends('admin.layouts.master')
<!-- mmmmmmmmmmmmmmmmm -->
@section('title') Delivery Charge @stop

@section('styles')
    <style>
        .admin-thumb {
            width: 50px;
        }
    </style>
@stop

@section('content')
    <?php

    if (!isset($deliverycharge)) {
        $deliverycharge = 0;
    }
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Delivery Charge
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
                        <h3 class="box-title">Delivery Charge</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['route' => 'updateDeliveryCharge']) !!}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Delivery Charge : </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            {{ csrf_field() }}
                                            <input type="number" class="form-control" name="deliverycharge"
                                                   value="{{trim($deliverycharge)}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <!-- /.box-body -->
                        {!! Form::close() !!}
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