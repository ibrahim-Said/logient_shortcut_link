<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}} - Dashboard</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{asset('/assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">
    
	
	<!-- Bootstrap-extend -->
	<link rel="stylesheet" href="{{asset('css/bootstrap-extend.css')}}">
	
	<!-- theme style -->
	<link rel="stylesheet" href="{{asset('css/master_style.css')}}">
	
	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="{{asset('css/skins/_all-skins.css')}}">
    <!-- sweetalert2.min.css !-->
	<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <!-- select2.min.css !-->
	<!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/assets/vendor_components/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor_components/bootstrap-switch/switch.css')}}">
    @stack('styles')
     
  </head>