@extends('admin.layouts.master')
<!-- mmmmmmmmmmmmmmmmm -->
@section('title') Bank Discount @stop

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
            Bank Discount
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
                        <h3 class="box-title">Bank Discount</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" style="text-align: center;">
                            <thead>
                            <tr>
                                <td>SL No</td>
                                <td>Name</td>
                                <td>Discount</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($banks as $i => $bank)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$bank->name}}</td>
                                    <td>
                                        {!! Form::open(['route' => 'bank.discount.update']) !!}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$bank->id}}">
                                        <input type="number" name="dis" value="{{$bank->discount}}" required>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        {!! Form::close() !!}
                                    </td>
                                    @if($bank->status==1)
                                        <td style="color: green;">Active</td>
                                    @else
                                        <td style="color: red;">Deactive</td>
                                    @endif
                                    <td>
                                        @if($bank->status==1)
                                            <a class="btn btn-danger"
                                               href="{{route('bank.discount.deactive',array($bank->id))}}">Deactive</a>
                                        @else
                                            <a class="btn btn-success"
                                               href="{{route('bank.discount.active',array($bank->id))}}"> Active </a>
                                        @endif
                                    </td>
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