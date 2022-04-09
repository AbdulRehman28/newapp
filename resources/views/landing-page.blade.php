<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cipdar - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="css/main2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body class="logo-sec">
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <img src="images/logo.png" alt="image" class="img-fluid forms-sec-buttns">
            @if (Route::has('login'))
            <div class="main-buttns">
                @auth
                    @if(auth()->user()->is_admin)
                    <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline">Home</a>
                     @else
                    <a href="{{ url('/language') }}" class="text-sm text-gray-700 underline">Home</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="forms-buttns">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="forms-buttns">Signup</a>
                    @endif
                @endauth
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>
