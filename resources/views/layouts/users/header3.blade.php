<header class="home-page-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-12">
          <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="image" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav navbar-cls py-4 py-md-0">
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                  <a class="nav-link" href="{{route('home')}}" role="button">Home</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a class="nav-link" href="{{route('testimonial')}}">Testimonial</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a class="nav-link" href="{{route('contact-us')}}" role="button">Contact Us</a>
                </li>
              @if (Route::has('login'))
                  @auth
                      @if(auth()->user()->is_admin)
                      <li class="mob-show">
                          <a href="{{ url('/admin') }}" class="banner-buttn-color">Panel</a>
                      </li>
                      @else
                      <li class="mob-show">
                      <a href="{{ url('/language') }}" class="banner-buttn-color">Dashbiard</a>
                      </li>
                      @endif
                  @else
                      <li class="mob-show">
                          <a href="{{ route('login') }}" class="forms-buttns">Login</a>
                      </li>

                      @if (Route::has('register'))
                      <li class="mob-show">
                          <a href="{{ route('register') }}" class="forms-buttns">Signup</a>
                      </li>
                      @endif
                  @endauth
              @endif
              </ul>
            </div>
              @if (Route::has('login'))
                  @auth
                      @if(auth()->user()->is_admin)
                          <div class="mob-none">
                              <a href="{{ url('/admin') }}" class="banner-buttn-color">Panel</a>
                          </div>
                      @else
                      <div class="mob-none">
                          <a href="{{ url('/language') }}" class="banner-buttn-color">Dashboard</a>
                      </div>
                      @endif
                  @else

                          <div class="mob-none">
                              <a href="{{ route('login') }}" class="banner-buttn-color login-right">Login</a>
                          </div>
                      @if (Route::has('register'))
                          <div class="mob-none register-new-icon">
                              <a href="{{ route('register') }}" class="banner-buttn-color">Register</a>
                          </div>
                      @endif
                  @endauth
              @endif
          </nav>
        </div>
      </div>
    </div>
  </header>
