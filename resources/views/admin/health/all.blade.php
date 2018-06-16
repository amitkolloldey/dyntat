@extends('admin.layouts.master')

@section('title') All Health Packages @stop

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
            All Health Packages
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">All Health Packages</li>
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
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($HealthScreens as $HealthScreen)
                                <tr>
                                    <td> {{ $HealthScreen->id }} </td>
                                    <td>
                                        @if( $HealthScreen->thumb != "" )
                                            <img class="admin-thumb" src="{{ adminUrl($HealthScreen->thumb) }}"/>
                                        @else
                                            <img class="admin-thumb" src="{{ adminUrl('partner/partner.png') }}"/>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{ $HealthScreen->title }}</div>
                                        <div>{{ "link: ".$HealthScreen->link }}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('health.edit', array($HealthScreen->id)) }}"
                                           class="btn btn-app">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('health.delete', array($HealthScreen->id)) }}"
                                           class="btn btn-app">
                                            <i class="fa fa-trash-o"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Thumb</th>
                                <th>Name</th>
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