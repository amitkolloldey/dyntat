@extends('admin.layouts.master')

@section('title') All Publication @stop

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
            All Publication
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">All Publication</li>
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
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Publications as $Publication)
                                <tr>
                                    <td> {{ $Publication->id }} </td>
                                    <td>
                                        @if( $Publication->thumb != "" )
                                            <img class="admin-thumb" src="{{ adminUrl($Publication->thumb) }}"/>
                                        @else
                                            <img class="admin-thumb" src="{{ adminUrl('partner/partner.png') }}"/>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{ $Publication->name }}</div>
                                        <div>{{ "link: ".$Publication->link }}</div>
                                    </td>
                                    <td>{{ $Publication->date }}</td>
                                    <td>
                                        <a href="{{ route('publication.edit', array($Publication->id)) }}"
                                           class="btn btn-app">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('publication.delete', array($Publication->id)) }}"
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

@stop
@section('scripts')
    <!-- page script -->
    <script>
        $(function () {
            $('#example2').DataTable();
        });
    </script>
@stop