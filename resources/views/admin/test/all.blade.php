@extends('admin.layouts.master')
@section('title') All Test @stop

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
            All Test
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">All Test</li>
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
                                <th>Sl</th>
                                <th>Test Name</th>
                                <th>Price</th>
                                <th>Categoris</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tests as $test)
                                <tr>
                                    <td> {{ $test->sl_no }} </td>
                                    {{--<td>  --}}
                                    {{--@if( $test->picture != "" && $testImg = json_decode($test->picture) ) --}}
                                    {{--<img class="admin-thumb" src="{{ adminUrl($testImg->thumb) }}" /> --}}
                                    {{--@else--}}
                                    {{--<img class="admin-thumb" src="{{ adminUrl('tests/service-4.png') }}" />--}}
                                    {{--@endif--}}
                                    {{--</td> --}}
                                    {{--<td>{{ $test->short_name }}</td> --}}
                                    <td>
                                        <div>{{ $test->title }}</div>
                                        <div>{{"link: ".$test->link}}</div>
                                    </td>
                                    <td>
                                        {{--<span class="price">Sale Price : {{ $test->sale_price }}</span> <br>--}}
                                        <strong class="price">Regular Price : {{ $test->price }}</strong>
                                    </td>
                                    <td>
                                        @foreach($test->categories as $cats)
                                            {{ $cats->name }},
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('test.edit', array($test->id)) }}" class="btn btn-app">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('test.delete', array($test->id)) }}" class="btn btn-app">
                                            <i class="fa fa-trash-o"></i>
                                            Delete
                                        </a>
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
            $('#example2').DataTable();
        });
    </script>
@stop