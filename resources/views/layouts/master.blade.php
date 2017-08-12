<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Treffapp</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/css/loadeffect.css" />
    <link href="/css/narrow-jumbotron.css" rel="stylesheet">
    <script src="/js/modernizr.custom.js"></script>
    <script src="/js/.custom.js"></script>
    <script src="/js/modernizr.custom.js"></script>
    <script src="/js/modernizr.custom.js"></script>

  </head>

  <body>
    <div id="ip-container" class="ip-container">
    <!-- initial header -->
      <header class="ip-header">
        <h1 class="ip-logo">
          <svg class="ip-inner" width="100%" height="100%" viewBox="0 0 300 160" preserveAspectRatio="xMidYMin meet" aria-labelledby="logo_title">
            <title id="logo_title">Delightful Demonstrations by Codrops</title>
            <path d="M279.464,97.909L269.13,83.176l8.756-20.404c0.139-0.322,0.09-0.696-0.126-0.972c-0.217-0.278-0.565-0.413-0.914-0.358 l-19.896,3.227l0.005-13.346c0-0.284-0.125-0.553-0.341-0.736c-0.217-0.183-0.502-0.262-0.781-0.215l-14.866,2.476l-0.002-13.066 c0-0.284-0.126-0.552-0.341-0.735c-0.216-0.183-0.501-0.263-0.782-0.215L61.814,68.626c-0.464,0.077-0.804,0.479-0.805,0.949 l-0.011,13.692l-17.223,2.824c-0.466,0.076-0.808,0.479-0.808,0.951l0.003,13.872l-21.803,3.606 0.193-0.581-0.29-1.211-0.29-1.857c0-1.292,0.29-2.73,1.033-3.921c0.743-1.158,1.874-2.091,3.522-2.398 c2.1-0.384,3.327,0.283,4.006,1.43c0.679,1.179,0.872,2.729,0.872,4.054L209.155,118.895z" />
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
    <div class="container">
         {{-- <div class="header clearfix">
          @include('layouts.nav')
         </div> --}}

         @yield('content')

         <div class="row marketing">
           <div class="col-lg-6">
             {{-- 3 h4 headings with text --}}
           </div>
         </div>

         @include('layouts.footer')

       </div> <!-- /container -->

       <!-- Bootstrap core JavaScript
       ================================================== -->
       <!-- Placed at the end of the document so the pages load faster -->
       <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
       <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


     </div>
   </div><!--  container -->
  </body>

</html>
