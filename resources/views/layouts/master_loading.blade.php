<!DOCTYPE html>
<html lang="de">
  <head>
      @include('layouts.head')
  </head>

  <body>
      <div id="ip-container" class="ip-container">
          <!-- initial header -->
          <header class="ip-header">
              <h1 class="ip-logo">
                  <svg class="ip-inner" width="100%" height="100%" viewBox="0 0 300 160" preserveAspectRatio="xMidYMin meet" aria-labelledby="logo_title">
                      <title id="logo_title">PaderMeet - Lerne neue Leute kennen.</title>
                            @include('layouts.logopath')
                            @include('layouts.logoname_svg')

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
                      @include('layouts.login_nav')

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
            @include('layouts.footerscript')
  </body>

</html>
