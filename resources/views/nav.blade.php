<?php
  $r = new App\Helpers\Role;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GENNEX</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Lightbox-->
    <link rel="stylesheet" href="{{ asset('vendor/lightbox2/css/lightbox.css') }}">
    <!-- Custom font icons-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.blue.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container"><a href="/" class="navbar-brand"><img src="{{ asset('img/logo.svg') }}" alt="" class="img-fluid"></a>
          <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu<i class="fa fa-bars ml-2"></i></button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                  <!-- Link-->
                </li>
                  <li class="nav-item dropdown">
                    <a id="pages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-cube" aria-hidden="true"></i> Product & Service</a>
                    <div class="dropdown-menu">
                      <a href="/products/spares" class="dropdown-item"> Spare Parts</a>
                      <a href="/products/metal_processing" class="dropdown-item"> Metal Processing</a>
                      <a href="/products/lift_material" class="dropdown-item"> Lift Material</a>
                    </div>

                  </li>
                  <!-- Link-->
                  <li class="nav-item"><a href="/inquiries" class="nav-link">|   &nbsp<i class="fa fa-list-ul" aria-hidden="true"></i> My Inquiry
                    @if(Session::has('inquiries') && count(session('inquiries')))
                      <span class="badge badge-danger">{{ count(session('inquiries')) }}</span>
                    @endif
                  </a>
                </li>
                  </li>
                  <li class="nav-item dropdown">
                    <a id="pages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">|  &nbsp<i class="fa fa-{{ Auth::check() ? 'user-circle-o' : 'user-o' }}" aria-hidden="true"></i> {{ Auth::check() ? Auth::user()->name : '' }} {!! Auth::check() && !$r->emailVerified() ? ' <span class="text-danger">[not verified]</span>' : '' !!}</a>
                    <div class="dropdown-menu">
                    @if (Auth::check())
                      @if($r->root())
                      <a href="/conf/categories" class="dropdown-item"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Material Group</a>
                      <a href="/conf/brands" class="dropdown-item"><i class="fa fa-tags" aria-hidden="true"></i> Manufacturers</a>
                        @if($r->vis())
                            <a href="/conf/lock" class="dropdown-item text-success"><i class="fa fa-lock" aria-hidden="true"></i> Lock Traffic</a>
                        @else
                            <a href="/conf/unlock" class="dropdown-item text-warning"><i class="fa fa-unlock" aria-hidden="true"></i> Traffic set Free</a>
                        @endif
                      @endif

                      @if($r->admin())
                      <a href="/products/create" class="dropdown-item"><i class="fa fa-cube" aria-hidden="true"></i> Add Products</a>
                      <a href="/users" class="dropdown-item"><i class="fa fa-users" aria-hidden="true"></i> Users</a>
                      @endif
                      <a href="/inquiries/show" class="dropdown-item"><i class="fa fa-list-ul" aria-hidden="true"></i> Inquires</a>
                      <a href="/users/show" class="dropdown-item"><i class="fa fa-address-card-o" aria-hidden="true"></i> Address Book</a>
                      <a href="/users/reset_password" class="dropdown-item"><i class="fa fa-key" aria-hidden="true"></i> Reset Password</a>
                      <a href="/logout" class="dropdown-item"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                    @else
                      <a href="/login" class="dropdown-item"><i class="fa fa-key" aria-hidden="true"></i> Login</a>
                      <a href="/accounts/create" class="dropdown-item"><i class="fa fa-anchor" aria-hidden="true"></i> Register</a>
                    @endif
                    </div>

                  </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    @yield('content')

    <footer class="main-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="footer-logo"><img src="{{  asset('img/logo-footer.svg') }}" alt="..." class="img-fluid"></div>
            <ul class="list-unstyled">
              <li>&nbsp<span class="footer-link">49 South Zhongba Road,</span></li>
              <li>&nbsp<span class="footer-link">Haian, Jiangsu Province,</span></li>
              <li>&nbsp<span class="footer-link">China 226600</span></li>
              <li>&nbsp<span class="footer-link">+86 513 8889 2688</span></li>
              <li>&nbsp<span class="footer-link">+86 513 8180 0823 (fax)</span></li>
              <li>&nbsp<span class="footer-link">info@joclift.con</span></li>
            </ul>

          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h5 class="footer-heading">INFORMATION</h5>
            <ul class="list-unstyled">
              <li> <a href="/profile" class="footer-link">Company Profile</a></li>
              <li> <a href="/terms" class="footer-link">Terms & Conditions </a></li>
              <li> <a href="/home" class="footer-link">Contact</a></li>
              <li> <a href="/privacy" class="footer-link">Privacy Policy</a></li>
            </ul>
          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h5 class="footer-heading">Product & Service</h5>
            <ul class="list-unstyled">
              <li> <a href="/products" class="footer-link">Spare Parts</a></li>
              <li> <a href="/products" class="footer-link">Metal Processing</a></li>
              <li> <a href="/products" class="footer-link">Lift Material</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
              <p class="copyrights-text mb-3 mb-lg-0">
                <small>Copyright &copy; 2019 - {{ now()->year }} 南通锦霖工程技术有限公司</small>
                <small><a href="http://beian.miit.gov.cn">苏ICP备08013754号</a></small>
              </p>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="list-inline social mb-0">
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook"></i></a><a href="#" class="social-link"><i class="fa fa-twitter"></i></a><a href="#" class="social-link"><i class="fa fa-youtube-play"></i></a><a href="#" class="social-link"><i class="fa fa-vimeo"></i></a><a href="#" class="social-link"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/lightbox2/js/lightbox.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
  <script>
    // ajax csrf
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
    });
</script>
  </body>
</html>
