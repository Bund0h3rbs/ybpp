<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>YAYASAN BAHKTI PURNA PORA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> --}}

    <!-- Style -->
  <link id="pagestyle" href="{{asset('assets/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
  </head>
<body>
    <main class="main-content  mt-0">
        <section>
          <div class="page-header min-vh-60">
            <div class="container">
              <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto ">
                  <div class="card card-plain mt-5">
                    <div class="card-header pb-0 text-left bg-transparent ">
                      <h3 class="font-weight-bolder text-info text-gradient">Login Aplikasi</h3>
                      <p class="mb-0">Pastikan Username dan Password anda telah terdaftar</p>
                    </div>
                    <div class="card-body ">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger text-white" style="font-size:0.9em">
                            <span > Username Dan Password Tidak Valid </span>
                        </div>
                        @endif
                        <form method="POST" name="form-login" action="{{ route('login') }}">
                            @csrf
                            <label>Email</label>
                            <div class="mb-3">
                            <input type="email" name="email" id='email' required class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Password</label>
                            <div class="mb-3">
                            <input type="password" class="form-control" required id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                            </div>
                            <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                            </div>
                      </form>
                    </div>
                    <div class="card-footer text-center pt-0 pb-0 px-lg-2 px-1">
                      <p class="mb-4 text-sm mx-auto">
                        Don't have an account?
                        <a href="javascript:;" class="text-danger font-weight-bold">Sign up</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6 bg-gradient-info" >

                    </div>
                    <img src="{{asset('assets/img/ybpp-nobg.png')}}" class="pt-7 " style="position:absolute; height:400px">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </main>

    <footer class="footer py-5">
        <div class="container">
          <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
              <p class="mb-0 text-secondary">
                Copyright © <script>
                  document.write(new Date().getFullYear())
                </script> Design By  <b>YBPP</b> IT-Team
              </p>
            </div>
          </div>
        </div>
      </footer>


</body>

</html>
