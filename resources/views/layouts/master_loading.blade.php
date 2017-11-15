<!DOCTYPE html>
<html lang="de">
<head>
    @include('layouts.head')
</head>

<body>
<div id="ip-container" class="ip-container">
    <header class="ip-header">
        <h1 class="ip-logo">
            <svg class="ip-inner" width="100%" height="100%" viewBox="0 0 300 160" preserveAspectRatio="xMidYMin meet" aria-labelledby="logo_title">
                <title id="logo_title">PaderMeet - Lerne neue Leute kennen.</title>
                @include('layouts.components.logopath')
                @include('layouts.components.logoname_svg')

            </svg>
        </h1>
        <div class="ip-loader">
            @include('layouts.components.loadingcircle')
        </div>
    </header>

    <div class="ip-main">

        <div class="container"> <!-- bootstrap container -->
            @include('layouts.nav')

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
