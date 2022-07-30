@php
 $path     = request::path();
 $exp      = explode('/', $path);
 $urlLink = isset($exp[0]) ? $exp[0] : null;

 $about   = null;
 $news    = null;
 $program = null;
 $contact = null;
 $home    = null;

 switch ($urlLink) {
    case 'about':
        $about ='active';
    break;
    case 'news':
        $news ='active';
    break;
    case 'program':
        $program ='active';
    break;
    case 'contact':
        $contact ='active';
    break;

    default:
        $home ='active';
 }
@endphp

<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto">
      <a href="{{url('/')}}">
          <img src="{{asset('assets/img/ybpp-nobg.png')}}">
      </a>
    </h1>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link {{$home}}" href="{{url('')}}">Home</a></li>
        <li><a class="nav-link {{$about}}" href="{{url('about')}}">About</a></li>
        <li><a class="nav-link {{$news}}" href="{{url('news')}}">News</a></li>
        <li><a class="nav-link {{$program}}" href="{{url('program')}}">Program</a></li>
        <li><a class="nav-link {{$contact}}" href="{{url('contact')}}">Contact</a></li>

        <li><a class="getstarted " href="{{url('login')}}">Masuk</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>
