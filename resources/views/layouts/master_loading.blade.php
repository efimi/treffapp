<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PaderMeet - Deine Treffapp für Paderborn</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/narrow-jumbotron.css" >
    <link rel="stylesheet" type="text/css" href="css/loadeffect.css" />
    <link rel="stylesheet" type="text/css" href="css/pushme.css" />
    <script src="js/modernizr.custom.js"></script>

  </head>

  <body>
      <div id="ip-container" class="ip-container">
          <!-- initial header -->
          <header class="ip-header">
              <h1 class="ip-logo">
                  <svg class="ip-inner" width="100%" height="100%" viewBox="0 0 300 160" preserveAspectRatio="xMidYMin meet" aria-labelledby="logo_title">
                      <title id="logo_title">PaderMeet - Lerne neue Leute kennen.</title>
                            @include('layouts.logopath')
                    </svg>
                </h1>
                    <div class="ip-loader">
                      <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                        <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                        <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                      </svg>
                    </div>
            </header>

              <div class="ip-main">
                  <div class="container"> <!-- bootstrap container -->
                      <div class="logo-show">
                          <img class="img-responsive" src="/img/logo.png" alt="logoPadermeet">
                      </div>
                     @yield('content')

                     @include('layouts.footer')

                   </div> <!-- /container -->

                   <!-- Bootstrap core JavaScript
                   ================================================== -->
                   <!-- Placed at the end of the document so the pages load faster -->
                   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                   {{-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> --}}


                </div> <!-- ip-main-->
            </div><!--  ip-container -->
            {{--  Scripts müssen unten sein--}}
            <script src="js/classie.js"></script>
            <script src="js/pathLoader.js"></script>
            <script src="js/main.js"></script>
  </body>

</html>
