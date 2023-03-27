<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-header></x-header>

<body class="skin-yellow sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <b class="logo-mini">
                    <span class="light-logo"><img src="../images/logo-light.png" alt="logo"></span>
                    <span class="dark-logo"><img src="../images/logo-dark.png" alt="logo"></span>
                </b>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <img src="../images/logo-light-text.png" alt="logo" class="light-logo">
                    <img src="../images/logo-dark-text.png" alt="logo" class="dark-logo">
                </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            
                                @foreach(config('locale',[]) as $locale)
                                @if($locale!=app()->getLocale())
                                <a href="{{route('locale.set',['locale'=>$locale])}}" class="dropdown-toggle">{{strtoupper($locale)}}
                                </a>
                                @endif
                                @endforeach
                        </li>
                        <!-- User Account -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('/images/user5-128x128.jpg') }}" class="user-image rounded-circle"
                                    alt="User Image">
                            </a>
                            <ul class="dropdown-menu scale-up">
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row no-gutters">
                                        <div class="col-12 text-left">
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><i class="fa fa-power-off" ></i> {{__("general.Logout")}}</a>
                                            
                                                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="ulogo">
                        <a href="/">
                            <span><b>{{env('APP_NAME')}}</span>
                        </a>
                    </div>
                </div>
                <!-- sidebar menu -->
                <x-menu></x-menu>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ $mainTitle }}
                </h1>
                <ol class="breadcrumb">
                    @if ($secondTitle)
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>
                                {{ $secondTitle }}</a></li>
                    @endif
                    @if ($thirdTitle)
                        <li class="breadcrumb-item active">{{ $thirdTitle }}</li>
                    @endif
                </ol>
            </section>

            <!-- Main content -->
            @yield('main_content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <input type="hidden" name="swal_title" id="swal_title" value="{{__('general.Attention')}}">
        <input type="hidden" name="swal_text" id="swal_text" value="{{__('general.Do you want to delete this item?')}}">
        <input type="hidden" name="confirmButtonText" id="confirmButtonText" value="{{__('general.Delete')}}">
        <input type="hidden" name="cancelButtonText" id="cancelButtonText" value="{{__('general.Cancel')}}">
        <input type="hidden" name="swal_success_alert_title" id="swal_success_alert_title" value="{{__('general.Nice !')}}">
        <footer class="main-footer">
            &copy; {{ date('Y') }} <a href="/">{{env('APP_NAME')}}</a>.{{__("general.All Rights Reserved")}} .
        </footer>


        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
    <x-script></x-script>
</body>

</html>
