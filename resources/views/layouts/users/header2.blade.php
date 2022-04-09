<header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-12">
          <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="javascriptvoid:(0)"><img src="images/logo.png" alt="image" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav navbar-cls py-4 py-md-0">
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                  <a class="nav-link" href="{{route('home')}}" role="button">Home</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a class="nav-link" href="{{'testimonial'}}">Testimonial</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a class="nav-link" href="{{'contact-us'}}" role="button">Contact Us</a>
                </li>
                <li class="mob-show">
                  <div class="dropdown">
                    <a href="javascriptvoid:(0)" class="jeff-anchor-link" data-toggle="dropdown">
                      <div class="jeff-profile">
                        <img src="images/profileavatar.png" alt="image" class="img-fluid">
                        <div class="jeff-profile-dropdown">
                          <h6 class="jeff-heading">Jeff Jordan <i class="fa fa-angle-down jeff-icon" aria-hidden="true"></i></h6>
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-menu">
                      {{-- <a class="dropdown-item" href="#">Profile 1</a>
                      <a class="dropdown-item" href="#">Profile 2</a> --}}
                      <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="dropdown mob-none">
              <a href="javascriptvoid:(0)" class="jeff-anchor-link" data-toggle="dropdown">
                <div class="jeff-profile">
                  <img src="images/profileavatar.png" alt="image" class="img-fluid">
                  <div class="jeff-profile-dropdown">
                    <h6 class="jeff-heading">{{auth()->user()->first_name}}<i class="fa fa-angle-down jeff-icon" aria-hidden="true"></i></h6>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu">
                  {{-- <a class="dropdown-item" href="#">Profile 1</a>
                  <a class="dropdown-item" href="#">Profile 2</a> --}}
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
