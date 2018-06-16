<!DOCTYPE html>
<html>
<!-- mmmmmmmmmmmmmmmmm -->
@include('admin/layouts/head')

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

          @include('admin.layouts.header')

          @include('admin.layouts.sidebar')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            @yield('content')
          </div><!-- /.content-wrapper -->

          @include('admin/layouts/footer')
		  
		  @include('admin.layouts.sidebar-option')

    </div>
	   
<!-- //////// JS Files ////////  -->
	<!-- jQuery 2.2.3 -->
	<script src="{{ asset('public/admin-assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="{{ asset('public/admin-assets/bootstrap/js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('public/admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/admin-assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('public/admin-assets/plugins/fastclick/fastclick.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('public/admin-assets/dist/js/app.min.js') }}"></script>
	<!-- Sparkline -->
	<script src="{{ asset('public/admin-assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
	<!-- jvectormap -->
	<script src="{{ asset('public/admin-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ asset('public/admin-assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<!-- SlimScroll 1.3.0 -->
	<script src="{{ asset('public/admin-assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
	<!-- ChartJS 1.0.1 -->
	<script src="{{ asset('public/admin-assets/plugins/chartjs/Chart.min.js') }}"></script>
	
	@yield('scripts')
	
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('public/admin-assets/dist/js/demo.js') }}"></script>
</body>
</html>