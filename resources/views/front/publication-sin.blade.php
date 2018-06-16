<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://androidpin.com/publication/css/jquery.jscrollpane.custom.css"/>
    <link rel="stylesheet" type="text/css" href="http://androidpin.com/publication/css/bookblock.css"/>
    <link rel="stylesheet" type="text/css" href="http://androidpin.com/publication/css/custom.css"/>
    <script src="http://androidpin.com/publication/js/modernizr.custom.79639.js"></script>
</head>
<body>

@if($publications)
    @foreach($publications as $publication)
@section('title') {{$publication->name}} -Dyntat Bangladesh Limited @stop
@section('pagetitle') Publicaion Details @stop
@section('metas')
    <meta name="description" content="{{$publication->meta_description}}">
@stop


<div id="container" class="container">

    <div class="menu-panel">
        <h3>Table of Contents</h3>
        <ul id="menu-toc" class="menu-toc">
            @if($pages = json_decode($publication->book))
                @foreach($pages as $i=>$page)
                    @if($i==0)
                        <li class="menu-toc-current"><a
                                    href="{{'#item'.$i}}">{{$page->pageName}}</a></li>
                    @else
                        <li><a href="{{'#item'.$i}}">{{$page->pageName}}</a></li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>


    <div class="bb-custom-wrapper">
        <div id="bb-bookblock" class="bb-bookblock">

            @if($pages = json_decode($publication->book))
                @foreach($pages as $i=>$page)
                    <div class="bb-item" id="{{'#item'.$i}}">
                        <div class="content">
                            <div class="scroller">
                                <img src="{{adminUrl($page->pageImage)}}"
                                     alt="{{$page->pageName}}"/>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <nav>
            <span id="bb-nav-prev">&larr;</span>
            <span id="bb-nav-next">&rarr;</span>
        </nav>

        <span id="tblcontents" class="menu-button">Table of Contents</span>

    </div>
    @endforeach
    @endif

</div><!-- /container -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://androidpin.com/publication/js/jquery.mousewheel.js"></script>
<script src="http://androidpin.com/publication/js/jquery.jscrollpane.min.js"></script>
<script src="http://androidpin.com/publication/js/jquerypp.custom.js"></script>
<script src="http://androidpin.com/publication/js/jquery.bookblock.js"></script>
<script src="http://androidpin.com/publication/js/page.js"></script>
<script>
    $(function () {

        Page.init();

    });
</script>
</body>
</html>
