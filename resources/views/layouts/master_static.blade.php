<!DOCTYPE html>
<html lang="de">
  <head>
    @include('layouts.head')

  </head>

  <body>
      @include('layouts.login_nav')
    <div class="container"> <!-- bootstrap container -->

        @yield('content')

        @include('layouts.footer')

     </div> <!-- /container -->
  </body>

</html>
