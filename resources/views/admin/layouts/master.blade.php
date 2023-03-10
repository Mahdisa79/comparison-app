<!doctype html>
<html lang="en" dir="rtl">

<head>

    @include('admin.layouts.head-tag')
    @yield('head-tag')

</head>

<body class="rtl app sidebar-mini">

	{{-- <!-- GLOBAL-LOADER -->
	<div id="global-loader">
		<img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
	</div>
	<!-- /GLOBAL-LOADER --> --}}

	<!-- PAGE -->
	<div class="page">
		<div class="page-main">


            @include('admin.layouts.header')



            @include('admin.layouts.sidebar')

            @yield('content')

		</div>


        {{-- @include('admin.layouts.footer') --}}

	</div>

	<!-- BACK-TO-TOP -->
	<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

    @include('admin.layouts.script')
    @yield('script')

    @include('admin.alerts.sweetalert.error')
    @include('admin.alerts.sweetalert.success')

</body>

</html>