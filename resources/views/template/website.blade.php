<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>YBPP | {{ Route::currentRouteName() }}</title>
	<link rel="icon" href="{{asset('assets/img/ybpp.ico')}}" type="image/x-icon"/>


    <meta content="" name="description">
    <meta content="" name="keywords">
	<!-- Fonts and icons -->
	<script src="{{asset('assets/js/webfont/webfont.min.js')}}"></script>
    <script>
		WebFont.load({
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset("assets/css/fonts.min.css")}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});

	</script>

    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" >
    <link rel="stylesheet" href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/remixicon/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style-website.css')}}">

    {{-- <link href="assets/css/style.css" rel="stylesheet"> --}}
    {{-- JS Group --}}
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>

    <script src="{{asset('assets/js/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
</head>
<body>
  @include('template.website-head')
  <!-- End Header -->
 <!-- End Hero -->
    @yield('content')
    <footer id="footer">

        <div class="footer-newsletter">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <h4>Bergabung Bersama Kami</h4>
                <p>Daftarkan diri anda untuk mengetahui mendapatkan informasi tentang kami</p>
                <form name="form-subscribe" id="form-subscribe" method="post">
                  <input type="email" name="email">
                  <input type="submit" value="Subscribe">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="footer-top">
          <div class="container">
            <div class="row">

              <div class="col-lg-3 col-md-6 footer-contact">
                <img src="{{asset('assets/img/ybpp.ico')}}" style="max-height:110px">

                <p class="pt-3">
                  Jln Asri 1 No.45 RT.002 RW 005 <br>
                  Pondok Rangon Cipayung<br>
                  Kota Adm Jakarta Timur<br>
                  DKI Jakarta<br><br>
                  <strong>Phone:</strong> +62 55488 55<br>
                  <strong>Email:</strong> info@ybpp.com<br>
                </p>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Legalitas</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('about/legalitas')}}">Privacy policy</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('about/legalitas')}}">Term & Condition</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('about/struktur')}}">Stuktur</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Aktivitas</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Keagamaan</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Kemanusiaan</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Pendidikan</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Social Networks</h4>
                <p>Ikutin Kami di sosial media </p>
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="container footer-bottom clearfix">
          <div class="copyright">
            &copy; Copyright <strong><span>YBPP</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by IT -Team YBPP
          </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{asset('assets/js/main-web.js')}}"></script>
    <script>
        $('#form-subscribe').submit(function( event ) {
            swal({
                title:"",
                text: "Maaf Fungsi Dalam Perbaikan",
                icon: "warning",
                buttons: false,
                timer: 2000,
            });
            return false;
        });
    </script>
</body>
</html>
