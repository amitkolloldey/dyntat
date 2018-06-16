@extends('admin.layouts.master')

@section('title') Edit Health @stop

@section('styles')
    <style>
        /*
        .user-create-form .form-group {
          clear: both;
          display: block;
          float: left;
          margin-bottom: 40px;
          width: 100%;
        }
        .user-create-form .form-group > label {
          color: #888;
          float: left;
          font-size: 20px;
          font-weight: normal;
          width: 20%;
        }
        .user-create-form .form-group .input-group {
          float: left;
          width: 40%;
        }
        */
        .test-create-form .form-group, .test-create-form .input-group {
            width: 100%;
        }

        .test-create-form .cats-list-checkbox {
            display: block;
            max-height: 400px;
            overflow-x: auto;
            overflow-y: scroll;
            width: 100%;
        }

        .test-create-form .cats-list-checkbox > label {
            display: block;
            padding: 5px;
            width: 100%;
        }

        .error-msg {
            color: red;
            display: inline-block;
            padding: 5px 10px 5px 30px;
            text-transform: capitalize;
        }

        #multipleupload .dropzone {
            border: 2px dashed #0087f7;
            padding: 16px 20px;
            text-align: center;
        }
    </style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Health
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('adminHome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Health</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- <pre>
                //print_r($errors);
                </pre> -->
                <div class="box">
                    {!! Form::open(['route' => 'health.update', 'class' => 'test-create-form']) !!}
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert alert-danger cart-address">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @foreach($HealthScreens as $HealthScreen)
                            <input type="hidden" name="healthId" value="{{ $HealthScreen->id }}"/>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Health Screening:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="title"
                                                   value="{{ $HealthScreen->title }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <div class="form-group">
                                        <label>Regular Price:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="price"
                                                   value="{{ $HealthScreen->price }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group">
                                        <label>Sale Price:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="old_price"
                                                   value="{{ $HealthScreen->old_price }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="meta_description"
                                                   value="{{ $HealthScreen->meta_description }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group no-margin">
                                        <label>Select package type:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <select class="form-control select2" name="package_type"
                                                    style="width: 100%;">
                                                <option value="health"
                                                        @if($HealthScreen->type == "health") selected @endif >Health
                                                    Screening
                                                </option>
                                                <option value="others"
                                                        @if($HealthScreen->type == "others") selected @endif >Other
                                                    Screening
                                                </option>
                                            </select>
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group">
                                        <label>Health Screening Content:</label>

                                        <div class="input-group">
                                            <textarea class="test-content"
                                                      name="content">{{ $HealthScreen->content }}</textarea>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Health Screening Thumb:</label>
                                        <div class="input-group post-thumb-field">
                                            <div id="multipleupload" class="multipleupload"
                                                 action="{{ route('upload.health.thumb') }}">
                                                <div class="dropzone">
                                                    <div class="dz-message">
                                                        <img id="post-thumb-prev"
                                                             src="{{ adminUrl($HealthScreen->thumb) }}" alt=""/>
                                                        <h3>Drop images here or click to upload.</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <input id="post-thumb-input" type="hidden" class="form-control" name="thumb"
                                                   value="{{$HealthScreen->thumb}}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    {{--<div>--}}
                                    {{--<table class="table table-bordered">--}}
                                    {{--Selected Test:--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                    {{--<td>ID</td>--}}
                                    {{--<td colspan="2">Name</td>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody id="selected_test">--}}
                                    {{--@foreach($selected_tests as $selected_test)--}}
                                    {{--<tr id="{{$selected_test->test->id.'selectedtest'}}">--}}
                                    {{--<td>{{$selected_test->test->id}}</td>--}}
                                    {{--<td>{{$selected_test->test->short_name}}</td>--}}
                                    {{--<td>--}}
                                    {{--<a href="" class='remove_test2'--}}
                                    {{--data-test-id="{{$selected_test->test->id}}"--}}
                                    {{--data-test-name="{{$selected_test->test->short_name}}">--}}
                                    {{--<span class='glyphicon glyphicon-minus'></span>--}}
                                    {{--</a>--}}
                                    {{--</td>--}}
                                    {{--<input type='hidden' id="{{$selected_test->test->id.'input'}}"--}}
                                    {{--name='tests[]'--}}
                                    {{--value='{{$selected_test->test->id}}'>--}}
                                    {{--</tr>--}}
                                    {{--@endforeach--}}
                                    {{--</tbody>--}}
                                    {{--</table>--}}
                                    {{--</div>--}}

                                    <div>
                                        <div>Test List:</div>
                                        <div id="all_test" style="overflow:auto; max-height: 100vh;">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <td>Checked</td>
                                                    <td>ID</td>
                                                    <td colspan="2">Name</td>
                                                </tr>
                                                </thead>
                                                <tbody id="tests">
                                                @foreach($tests as $i => $test)
                                                    @if(in_array($test->id,$ids))
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="testsId[]"
                                                                       value="{{ $test->id}}" checked/>
                                                            </td>

                                                            <td>{{$i+1}}</td>
                                                            <td>{{ $test->title}}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="testsId[]"
                                                                       value="{{ $test->id}}"/>
                                                            </td>

                                                            <td>{{$i+1}}</td>
                                                            <td>{{ $test->title}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@stop
@section('scripts')

    <script src="{{ asset('public/admin-assets/dist/js/dropzone.js') }}"></script>
    <script src="{{ asset('/public/tinymce/4.7.1/js/tinymce/tinymce.min.js') }}"></script>
    <!-- page script -->
    <script>

        tinymce.init({
            selector: 'textarea',
            height: 500,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'],
            file_browser_callback: function (field, url, type, win) {
                tinyMCE.activeEditor.windowManager.open({
                    file: '/public/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                    title: 'KCFinder',
                    width: 700,
                    height: 500,
                    inline: true,
                    close_previous: true
                }, {
                    window: win,
                    input: field
                });
                return false;
            }
        });

        $(document).ready(function () {
            var actionUrl = $(".multipleupload").attr('data-action');
            Dropzone.autoDiscover = false;
            $("#multipleupload").dropzone({
                paramName: "thumb",
                url: actionUrl,
                uploadMultiple: false,
                previewsContainer: false,
                addRemoveLinks: true,
                sending: function (file, xhr, formData) {
                    formData.append('_token', $("input[name=_token]").val());
                },
                success: function (file, response, done) {
                    $("#multipleupload").parents('.post-thumb-field').find('#post-thumb-input').attr("value", response.imageName);
                    $("#multipleupload").parents('.post-thumb-field').find('#post-thumb-prev').attr("src", response.image);
                }
            });
        });
    </script>
@stop