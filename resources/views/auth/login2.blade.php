<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cipdar - Sign In 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="css/main2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body class="grey-background">
    <!-- HEADER SECTION BEGIN -->
   @include('layouts.users.header')
    <!-- HEADER SECTION END -->
    <!-- FORM SECTION BEGIN -->
    <section class="form-sec">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 col-sm-12 col-12">
            <img src="images/bone-img.png" alt="image" class="img-fluid">
          </div>
          <div class="col-md-7 col-sm-12 col-12">
            <div class="main-signin-content">
              <div class="main-content">
                <h2 class="account-heading">Log in to your Account</h2>
                <p class="account-text">Don’t have an account? <a href="{{ route('register') }}" class="account-link">Sign Up</a></p>
              </div>
              <div class="main-form">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                  <div class="fields-flex">
                    <div class="main-field  {{ $errors->has('email') ? 'error-border' : '' }}">
                      <label class="label-text">Email</label>
                      <input type="email" id="email" name="email" class="label-field" value="{{ old('email', null) }}" placeholder="Enter Your Email">
                      <div class="icon-sec">
                        <a href="javascriptvoid:(0)" class="icon-link-color"><i class="fa fa-envelope icon-color" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="row error-des">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="error1">
                            @if($errors->has('email'))
                                <p class="">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                  <div class="fields-flex">
                    <div class="main-field {{ $errors->has('email') ? 'error-border' : '' }}">
                      <label class="label-text">Password</label>
                      <input type="password" id="password" name="password" class="label-field" placeholder="***********">
                      <div class="icon-sec">
                        <a href="#" class="icon-link-color "><i class="fa fa-eye icon-color pass togglePassword" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="row error-des">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="error1">
                            @if($errors->has('password'))
                                <p class="">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                  <div class="form-button">
                    <button type="submit" class="create-button">Log In</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row links-bottom">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="copy-sec-flex">
              <p class="copy-text">Copyright © 2022 Cipdar. All rights reserved.</p>
              <ul>
                <li class="quick-links"><a href="javascriptvoid:(0)" class="quick-links-text">Privacy</a></li>
                <li class="quick-links"><span class="line-color">|</span></li>
                <li class="quick-links"><a href="javascriptvoid:(0)" class="quick-links-text">Terms of Use</a></li>
                <li class="quick-links"><span class="line-color">|</span></li>
                <li class="quick-links"><a href="javascriptvoid:(0)" class="quick-links-text">Cookie preferences</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- FORM SECTION END -->
    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script>

            $('.togglePassword').on('click', function(e) {
            e.preventDefault();

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#password");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });


    </script>

    <script>
      document.querySelector('#nav-toggler').addEventListener('click', function(){
      document.querySelector('#nav-toggler').classList.toggle('nav-toggle');
      document.querySelector('.mobnav-bg').classList.toggle('menu-open');
      });



    </script>

  </body>
</html>
