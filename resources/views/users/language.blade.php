<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="css/main2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body class="grey-background">
    <!-- HEADER SECTION BEGIN -->
   @include('layouts.users.header2')
    <!-- HEADER SECTION END -->
    <!-- FORM SECTION BEGIN -->
    <section class="form-sec language-sec">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 col-sm-12 col-12 height-set mobile-tab-img">
            <img src="images/bone2.png" alt="image" class="img-fluid bone-img">
          </div>
          <div class="col-md-7 col-sm-12 col-12">
            <div class="main-signin-content">
              <div class="main-form main-form-select">
                <form action="{{route('selected-language')}}">
                    @csrf
                  <div class="fields-flex-select">
                    <label class="gender-text">Select Language</label>
                    <select class="gender-text-select" name="language_id">
                        @foreach ($languages as $language )
                            <option value="{{$language->id}}">{{ucfirst($language->language)}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="fields-flex-select">
                    <label class="gender-text">Gender</label>
                    <select class="gender-text-select" name="gender_id">
                        @foreach ($genders as $gender )
                        <option value="{{$gender->id}}">{{$gender->gender}}</option>

                        @endforeach
                    </select>
                  </div>
                  <div class="form-next-button">
                    <button type="submit" class="next-button">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
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
    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script>
      document.querySelector('#nav-toggler').addEventListener('click', function(){
      document.querySelector('#nav-toggler').classList.toggle('nav-toggle');
      document.querySelector('.mobnav-bg').classList.toggle('menu-open');
      });
    </script>
  </body>
</html>
