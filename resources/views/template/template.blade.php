<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>YBPP | {{ Route::currentRouteName() }}</title>
	<link rel="icon" href="{{asset('assets/img/ybpp.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('assets/js/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			// google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset("assets/css/fonts.min.css")}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});

	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/atlantis.css')}}">
    <link rel="stylesheet" href="{{asset('assets/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{asset('assets/select2/css/select2-bootstrap4.css') }}">
	<link rel="stylesheet" href="{{asset('assets/css/style-me.css')}}">

    <script src="{{asset('assets/js/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

	<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.scrollbar.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap-notify.min.js')}}"></script>

    <script src="{{asset('assets/js/atlantis.js')}}"></script>
    <script src="{{asset('assets/js/datatables.min.js')}}"></script>
	<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.js') }}"></script>
    <script src="{{asset('assets/select2/js/select2.full.min.js') }}"></script>
</head>

<body  data-background-color="bg3">
    <div class="wrapper">
        @include('template.header')
        @include('template.menus')

        <div class="main-panel">
			<div class="content">

                @yield('content')

                <footer class="footer mt-3" >
                    <div class="container-fluid">
                        <nav class="pull-left">
                           <span class="text-primary">
                            Yayasan Bhakti Purna Pora
                           </span>
                        </nav>
                        <div class="copyright ml-auto">
                            2022, Design & Development by <a href="#">VIEHS</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

</body>
</html>
