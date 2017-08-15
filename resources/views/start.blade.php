@extends('layouts.master')

@section('content')

  <div class="jumbotron">
    <p class="lead">Drücke auf den Button</p>
    <p class="lead">und finde heraus wo es heute für dich hingeht</p>

        <p>
            @if($location)
              <div class="pushme" role="button" id="button" onclick="$('html,body').animate({
              scrollTop: $("#database_entry").offset().top},
              'slow');">  <span class="inner">Wir warten auf dich :)  </span> </div>
              @else
              <div class="pushme" role="button" id="button" >  <span class="inner"> Let's Go! </span> </div>

              @endif
        </p>
  </div>

  <div class="jumbotron" id="resultview">
        <div id="database_entry">
                            @if($location)
                              <p>{{ $location->name }}</p>
                              <div>{{ $location->googlemaps_frame }}</div>
                              <p>Heute 20:00</p>
                              <div id="current_matched">
                                 <?php // TODO: mit Mermkal from visitor->Location(location)->merkmale ?>
                                @if ($location->used_places ==1)
                                    @elseif ($location->used_places == 2 )
                                        <p>Du bist nicht alleine!!:) Derzeit kommt noch eine weitere Person</p>
                                    @else
                                        <p>Derzeit kommen noch {{ ($location->used_places)-1 }} weitere Personen</p>
                                @endif
                              </div>
                            @endif
        </div>

    @include('ip_debug')
  </div>

  @if(!$location)
    <script src="js/buttonclick.js"></script>
  @endif
@endsection
