<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cipdar - Testimonial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="css/main2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    <link rel="stylesheet" href="css/animate.css">
  </head>
  <body>
    <!-- HEADER SECTION BEGIN -->
    @include('layouts.users.header3')
    <!-- HEADER SECTION END -->
    <!-- TESTIMONIAL BANNER SECTION BEGIN -->
    <section class="testimonial-banner-sec">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <h1 class="test-banner wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.8s">Testimonials</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- TESTIMONIAL BANNER SECTION END -->
    <!-- TESTIMONIAL SLIDER SECTION BEGIN -->
    <section class="testimonial-slider-sec">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="slider responsive slider-border">
                <div>
                  <h4 class="slider-test-heading">TESTIMONIALS</h4>
                  <p class="slider-test-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to</p>
                  <img src="images/small-img.png" alt="image" class="img-fluid slider-small-img">
                  <span class="slider-small-text">C.E.O Wayne Enterprise</span>
                </div>
                <div>
                  <h4 class="slider-test-heading">TESTIMONIALS</h4>
                  <p class="slider-test-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to</p>
                  <img src="images/small-img.png" alt="image" class="img-fluid slider-small-img">
                  <span class="slider-small-text">C.E.O Wayne Enterprise</span>
                </div>
                <div>
                  <h4 class="slider-test-heading">TESTIMONIALS</h4>
                  <p class="slider-test-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to</p>
                  <img src="images/small-img.png" alt="image" class="img-fluid slider-small-img">
                  <span class="slider-small-text">C.E.O Wayne Enterprise</span>
                </div>
                <div>
                  <h4 class="slider-test-heading">TESTIMONIALS</h4>
                  <p class="slider-test-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to</p>
                  <img src="images/small-img.png" alt="image" class="img-fluid slider-small-img">
                  <span class="slider-small-text">C.E.O Wayne Enterprise</span>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- TESTIMONIAL SLIDER SECTION END -->
    <!-- FOOTER SECTION BEGIN -->
    <footer class="home-page-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-12">
          </div>
          <div class="col-md-6 col-sm-6 col-12">
            <div class="footer-main-content">
              <h4 class="footer-heading">Get our weakly news!</h4>
              <div class="footer-input">
                <input type="text" class="footer-input-field">
                <button type="button" class="footer-sub-buttn">SUBSCRIBE</button>
              </div>
              <p class="footer-inner-text">When you select "Subscribe" you will start receiving our email newsletter. Use the links at the bottom of any email to manage the type of emails you receive or to unsubscribe. See our privacy policy for additional details.</p>
              <ul class="footer-links">
                <li class="footer-links-inner"><a href="javascriptvoid:(0)" class="footer-links-text">About</a></li>
                <li class="footer-links-inner"><a href="javascriptvoid:(0)" class="footer-links-text">News</a></li>
                <li class="footer-links-inner"><a href="javascriptvoid:(0)" class="footer-links-text">Contact</a></li>
              </ul>
              <p class="footer-inner-text">©2022 Visible Body. All Rights Reserved.<br> User Agreement  Privacy  Permissions</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-12">
          </div>
        </div>
      </div>
    </footer>
    <!-- FOOTER SECTION END -->
    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
    <script>
      document.querySelector('#nav-toggler').addEventListener('click', function(){
      document.querySelector('#nav-toggler').classList.toggle('nav-toggle');
      document.querySelector('.mobnav-bg').classList.toggle('menu-open');
      });
    </script>
    <script>
      $('.responsive').slick({
        dots: true,
        infinite: true,
        arrows: false,
        autoplay: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    </script>
  </body>
</html>
