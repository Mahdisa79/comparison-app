<!doctype html>
<html lang="en" dir="rtl">
  <head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

        @yield('head-tag')
		<!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset("admin-assets/assets/images/brand/favicon.ico")}}"/>

	
        <!-- BOOTSTRAP CSS -->
	
        <link id="style" href="{{asset("admin-assets/assets/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" />

	
        <!-- STYLE CSS -->
        <link href="{{asset("admin-assets/assets/css/style.css")}}" rel="stylesheet" />
        <link href="{{asset("admin-assets/assets/css/skin-modes.css")}}" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="{{asset("admin-assets/assets/css/icons.css")}}" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/custom-style.css') }}">

	
    </head>

	<body class="rtl login-img">


			<!-- PAGE -->
			<div class="page">
				<div>
                    @yield('content')
				</div>
			</div>
			<!-- END PAGE -->



		<!-- JQUERY JS -->
        <script src="{{asset("admin-assets/assets/js/jquery.min.js")}}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{asset("admin-assets/assets/plugins/bootstrap/js/popper.min.js")}}"></script>
        <script src="{{asset("admin-assets/assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>


		<!-- Perfect SCROLLBAR JS-->
		<script src="{{asset("admin-assets/assets/plugins/p-scroll/perfect-scrollbar.js")}}"></script>


		<!-- STICKY JS -->
        <script src="{{asset("admin-assets/assets/js/sticky.js")}}"></script>

		<!-- COLOR THEME JS -->
        <script src="{{asset("admin-assets/assets/js/themeColors.js")}}"></script>

		<!-- CUSTOM JS -->
        <script src="{{asset("admin-assets/assets/js/custom.js")}}"></script>
        @yield('script')
	</body>
</html>
