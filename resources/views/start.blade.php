@extends('layouts.master_loading')

@section('content')

  <div class="jumbotron no-margin no-padding-bottom">
    <p class="lead">Drücke auf den Button</p>
    <p class="lead">und finde heraus wo es heute für dich hingeht</p>

        <p>
            @if($location)
              <button class="pushme" role="button" id="button" onclick="$('html, body').animate({
        scrollTop: $('#database_entry').offset().top
    }, 500);">  <span class="inner">Wir warten auf dich :) </span> </button>
              @else
                  <form class="" action="" method="post">
                     <label class="checkbox-inline"><input type="checkbox" value="">Wir kommen zu zweit.</label>
                  </form>
              <div class="pushme" role="button" id="button">  <span class="inner"> Let's Go! </span> </div>

              @endif
        </p>
  </div>

  <div class="jumbotron" id="resultview">
        <div id="database_entry">
                            @if($location)
                              <h1>{{ $location->name }}</h1>
                              <h3>Heute 20:00</h3>
                              <br>
                              @include('locations.map', $location)
                              <br>

                              @include('visitors.current', $location)
                            @endif
        </div>

    {{-- @include('ip_debug') --}}
  </div>
  @if(!$location)
    <script src="js/buttonclick.js"></script>
  @endif
@endsection
