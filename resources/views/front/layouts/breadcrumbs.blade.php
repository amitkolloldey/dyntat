<section class="page-baner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="page-title">
                    <h1>@yield('pagetitle')</h1>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="breadcumbs">
                    <ul>
                        <li>
                            <a href="{{route('home')}}">Home</a><span class="glyphicon glyphicon-menu-right"></span>@yield('pagetitle2')
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>  