<head>
<!-- mmmmmmmmmmmmmmmmm -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin|@yield('title')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<!-- Meta -->
    @yield('metas')

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('public/admin-assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin-assets/plugins/datatables/dataTables.bootstrap.css') }}">
	<!-- Theme style -->
	<link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
	
	@yield('styles')
	
	<link rel="stylesheet" href="{{ asset('public/admin-assets/dist/css/AdminLTE.min.css') }}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset('public/admin-assets/dist/css/skins/_all-skins.min.css') }}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<style>
	.dropzone .dz-message > img {
	  max-width: 100%;
	}
</style>
</head>