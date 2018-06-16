<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- mmmmmmmmmmmmmmmmm -->

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="">
                <a href="{{ route('adminHome') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview
                @if( ( Route::currentRouteName() == 'orders' ) || ( Route::currentRouteName() == 'order.panding' ) || ( Route::currentRouteName() == 'order.processing' ) 
                 || ( Route::currentRouteName() == 'order.sucess' ) || ( Route::currentRouteName() == 'order.cancel' ) || ( Route::currentRouteName() == 'order.panding.up') || (Route::currentRouteName() == 'report.all' ) )
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span> Orders </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'temp.orders' ) || ( Route::currentRouteName() == 'temp.orders') ) active @endif">
                        <a href="{{ route('temp.orders') }}"><i class="fa fa-circle-o"></i>Temporary Orders</a></li>

                    <li class="@if( (Route::currentRouteName() == 'order.panding' ) || ( Route::currentRouteName() == 'order.panding.up') ) active @endif">
                        <a href="{{ route('order.panding') }}"><i class="fa fa-circle-o"></i>Orders Pending</a></li>

                    <li class="@if( (Route::currentRouteName() == 'order.processing' ) ) active @endif"><a
                                href="{{ route('order.processing') }}"><i class="fa fa-circle-o"></i>Orders
                            Processing</a></li>

                    <li class="@if( (Route::currentRouteName() == 'order.sucess' ) ) active @endif"><a
                                href="{{ route('order.sucess') }}"><i class="fa fa-circle-o"></i>Orders Sucess</a></li>
                    <li class="@if( (Route::currentRouteName() == 'order.cancel' ) ) active @endif"><a
                                href="{{ route('order.cancel') }}"><i class="fa fa-circle-o"></i>Orders Cancel</a></li>
                    <li class="@if( (Route::currentRouteName() == 'report.all' ) ) active @endif"><a
                                href="{{ route('report.all') }}"><i class="fa fa-circle-o"></i>Report Update</a></li>
                    <li class="@if( (Route::currentRouteName() == 'orders' ) ) active @endif"><a
                                href="{{ route('orders') }}"><i class="fa fa-circle-o"></i>All Orders</a></li>
                </ul>
            </li>


            <li class="treeview
                @if( (Route::currentRouteName() == 'test.all' ) || ( Route::currentRouteName() == 'test.add') 
                || ( Route::currentRouteName() == 'test.create') || ( Route::currentRouteName() == 'test.edit') 
                || ( Route::currentRouteName() == 'cats.all') || ( Route::currentRouteName() == 'cats.edit'))
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Online Test</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'test.all' ) ) active @endif"><a
                                href="{{ route('test.all') }}"><i class="fa fa-circle-o"></i> Test All</a></li>
                    <li class="@if( (Route::currentRouteName() == 'test.add' ) ) active @endif"><a
                                href="{{ route('test.add') }}"><i class="fa fa-circle-o"></i> Test Add</a></li>
                    <li class="@if( (Route::currentRouteName() == 'cats.all' ) ) active @endif"><a
                                href="{{ route('cats.all') }}"><i class="fa fa-circle-o"></i> Category</a></li>
                </ul>
            </li>

            <li class="treeview 
                @if( (Route::currentRouteName() == 'health.all' ) || ( Route::currentRouteName() == 'health.add') 
                || ( Route::currentRouteName() == 'health.edit') )
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Health Screening</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'health.all' ) ) active @endif"><a
                                href="{{ route('health.all') }}"><i class="fa fa-circle-o"></i> Health Screening All</a>
                    </li>
                    <li class="@if( (Route::currentRouteName() == 'health.add' ) ) active @endif"><a
                                href="{{ route('health.add') }}"><i class="fa fa-circle-o"></i> Health Screening Add</a>
                    </li>
                </ul>
            </li>


            <li class="treeview 
                @if( (Route::currentRouteName() == 'offer.all' ) || ( Route::currentRouteName() == 'offer.add') 
                || ( Route::currentRouteName() == 'offer.edit') )
                    active
                @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Offer List</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'offer.all' ) ) active @endif"><a
                                href="{{ route('offer.all') }}"><i class="fa fa-circle-o"></i> Offer All</a></li>
                    <li class="@if( (Route::currentRouteName() == 'offer.add' ) ) active @endif"><a
                                href="{{ route('offer.add') }}"><i class="fa fa-circle-o"></i> Offer Add</a></li>
                </ul>
            </li>


            <li class="treeview
            @if( (Route::currentRouteName() == 'slider.all' ) || ( Route::currentRouteName() == 'slider.add')
            || ( Route::currentRouteName() == 'slider.edit') )
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Slider List</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'slider.all' ) ) active @endif"><a
                                href="{{ route('slider.all') }}"><i class="fa fa-circle-o"></i> Slider All</a></li>
                    <li class="@if( (Route::currentRouteName() == 'slider.add' ) ) active @endif"><a
                                href="{{ route('slider.add') }}"><i class="fa fa-circle-o"></i> Slider Add</a></li>
                </ul>
            </li>


            <li class="treeview
                @if( (Route::currentRouteName() == 'media.all' ) || ( Route::currentRouteName() == 'media.add') 
                || ( Route::currentRouteName() == 'media.edit') )
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Media List</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'media.all' ) ) active @endif"><a
                                href="{{ route('media.all') }}"><i class="fa fa-circle-o"></i> Media All</a></li>
                    <li class="@if( (Route::currentRouteName() == 'media.add' ) ) active @endif"><a
                                href="{{ route('media.add') }}"><i class="fa fa-circle-o"></i> Media Add</a></li>
                </ul>
            </li>


            <li class="treeview
                @if( (Route::currentRouteName() == 'partner.all' ) || ( Route::currentRouteName() == 'partner.add') 
                || ( Route::currentRouteName() == 'partner.edit') )
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Partner List</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'partner.all' ) ) active @endif"><a
                                href="{{ route('partner.all') }}"><i class="fa fa-circle-o"></i> Partner All</a></li>
                    <li class="@if( (Route::currentRouteName() == 'partner.add' ) ) active @endif"><a
                                href="{{ route('partner.add') }}"><i class="fa fa-circle-o"></i> Partner Add</a></li>
                </ul>
            </li>

            <li class="treeview 
                @if( (Route::currentRouteName() == 'clientsay.all' ) || ( Route::currentRouteName() == 'clientsay.add') 
                || ( Route::currentRouteName() == 'clientsay.edit') )
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Client Feedback</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'clientsay.all' ) ) active @endif"><a
                                href="{{ route('clientsay.all') }}"><i class="fa fa-circle-o"></i> Client All</a></li>
                    <li class="@if( (Route::currentRouteName() == 'clientsay.add' ) ) active @endif"><a
                                href="{{ route('clientsay.add') }}"><i class="fa fa-circle-o"></i> Client Add</a></li>
                </ul>
            </li>

            <li class="treeview 
                @if( (Route::currentRouteName() == 'career.all' ) || ( Route::currentRouteName() == 'career.add')
                || ( Route::currentRouteName() == 'career.edit'))
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Career</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'career.all' ) ) active @endif"><a
                                href="{{ route('career.all') }}"><i class="fa fa-circle-o"></i> Career All</a></li>
                    <li class="@if( (Route::currentRouteName() == 'career.add' ) ) active @endif"><a
                                href="{{ route('career.add') }}"><i class="fa fa-circle-o"></i> Career Add</a></li>
                </ul>
            </li>

            <li class="treeview 
                @if( (Route::currentRouteName() == 'publication.all' ) || ( Route::currentRouteName() == 'publication.add')
                || ( Route::currentRouteName() == 'publication.edit'))
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Publication</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'publication.all' ) ) active @endif"><a
                                href="{{ route('publication.all') }}"><i class="fa fa-circle-o"></i> Publication All</a>
                    </li>
                    <li class="@if( (Route::currentRouteName() == 'publication.add' ) ) active @endif"><a
                                href="{{ route('publication.add') }}"><i class="fa fa-circle-o"></i> Publication Add</a>
                    </li>
                </ul>
            </li>

            <li class="treeview 
                @if( (Route::currentRouteName() == 'doctor' ) || ( Route::currentRouteName() == 'healthcare')
                || ( Route::currentRouteName() == 'customer') || ( Route::currentRouteName() == 'corporate'))
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span> Registration Info </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="@if( (Route::currentRouteName() == 'doctor' ) ) active @endif"><a
                                href="{{ route('doctor') }}"><i class="fa fa-circle-o"></i>Doctor Reg</a></li>
                    <li class="@if( (Route::currentRouteName() == 'healthcare' ) ) active @endif"><a
                                href="{{ route('healthcare') }}"><i class="fa fa-circle-o"></i>Health Care Reg</a></li>
                    <li class="@if( (Route::currentRouteName() == 'customer' ) ) active @endif"><a
                                href="{{ route('customer') }}"><i class="fa fa-circle-o"></i>Customer Messages</a></li>
                    <li class="@if( (Route::currentRouteName() == 'corporate' ) ) active @endif"><a
                                href="{{ route('corporate') }}"><i class="fa fa-circle-o"></i>Corporate Messages</a>
                    </li>
                </ul>
            </li>


            <li class="
                @if( ( Route::currentRouteName() == 'booktest.all' ) || ( Route::currentRouteName() == 'booktest.single' ) )
                    active
@endif ">
                <a href="{{route('booktest.all')}}">
                    <i class="fa fa-dashboard"></i> <span>Booking Tests</span>
                </a>
            </li>

            <li class="
                @if( ( Route::currentRouteName() == 'requestcall.all' ) || ( Route::currentRouteName() == 'requestcall.single' ) )
                    active
@endif ">
                <a href="{{route('requestcall.all')}}">
                    <i class="fa fa-dashboard"></i> <span>Request Call</span>
                </a>
            </li>


            <li class="treeview
                @if( (Route::currentRouteName() == 'deliveryCharge' ))
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Others</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'deliveryCharge' ) ) active @endif">
                        <a href="{{ route('deliveryCharge') }}"><i class="fa fa-circle-o"></i>Delivery Charge</a>
                    </li>
                    <li class="@if( (Route::currentRouteName() == 'coupon.all' ) ) active @endif">
                        <a href="{{ route('coupon.all') }}"><i class="fa fa-circle-o"></i>Coupon</a>
                    </li>

                    <li class="@if( (Route::currentRouteName() == 'bank.discount.all' ) ) active @endif">
                        <a href="{{ route('bank.discount.all') }}"><i class="fa fa-circle-o"></i>Bank Discount</a>
                    </li>
                </ul>
            </li>


            <li class="treeview 
                @if( (Route::currentRouteName() == 'serviceArea.all' ) || ( Route::currentRouteName() == 'serviceArea.add') 
                || ( Route::currentRouteName() == 'serviceArea.edit') || Route::currentRouteName() == 'serviceClient.all' )
                    || ( Route::currentRouteName() == 'serviceClient.add') || Route::currentRouteName() == 'serviceClient.edit' ) )
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Service Locations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'serviceArea.all' ) ) active @endif"><a
                                href="{{ route('serviceArea.all') }}"><i class="fa fa-circle-o"></i> Service Area</a>
                    </li>
                    <li class="@if( (Route::currentRouteName() == 'serviceClient.all' ) ) active @endif"><a
                                href="{{ route('serviceClient.all') }}"><i class="fa fa-circle-o"></i> Service
                            Client</a></li>
                </ul>
            </li>

            <li class="treeview 
                @if( (Route::currentRouteName() == 'user.all' ) || ( Route::currentRouteName() == 'user.add') 
                || ( Route::currentRouteName() == 'user.edit') )
                    active
@endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if( (Route::currentRouteName() == 'user.all' ) ) active @endif"><a
                                href="{{ route('user.all') }}"><i class="fa fa-circle-o"></i> User All</a></li>
                    @if(Auth::user()->hasAnyRole('Admin'))
                        <li class="@if( (Route::currentRouteName() == 'user.add' ) ) active @endif"><a
                                    href="{{ route('user.add') }}"><i class="fa fa-circle-o"></i> Add User</a></li>
                    @endif
                </ul>
            </li>
        <!--
            <li>
                <a href="{{route('settings')}}">
                    <i class="fa fa-dashboard"></i> <span>Settings</span>
                </a> 
            </li>
            
              <li>
                  <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-yellow">12</small>
                      <small class="label pull-right bg-green">16</small>
                      <small class="label pull-right bg-red">5</small>
                    </span>
                  </a>
                </li> 
            -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>