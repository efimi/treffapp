@extends('layouts.master')

@section('content')

  <div class="jumbotron">

    <h1>Treffapp</h1>

    <p class="lead">Drücke auf den Button </p>
    <p class="">und finde heraus wo es heute für dich hingeht</p>

    <p><a class="btn btn-lg btn-primary" role="button" id="button">Let's Go</a></p>

    <div id="showplace">

          @if($location)
              <p>{{ $location->name }}</p>
              <p>{{ $location->address }}</p>
              <p> Heute 20:00</p>
              <div id="current_matched">
                <?php // TODO: ajax call from database ?>
              </div>
          @endif
    </div>

  </div>

  <div class="jumbotron">
    <p>Deine IP:   {{ request()->ip() }}</p>

    <p> Deine Jetzige Session ID:</p>
    <p class="text-center">{{ Session::getId() }}</p>
    <p><?php
    session_start();


    if (!isset($_SESSION['visited'])) {
       echo "Du hast diese Seite noch nicht besucht";
       // TODO: loadrandom palce, save with Session
       $_SESSION['visited'] = true;

    } else {
       echo "Du hast diese Seite zuvor schon aufgerufen";
       // TODO: get SessionID,
       // TODO: show myplace form sessionID
    }
    ?>
    </p>
</div>
  @if(!$location)
    <script>
    $(function() {
      // .one =  nur einmal ausfßhren von dem Code
      $('#button').one('click',function () {

        $.ajax({
          url: 'getplace',
          method: 'get',
          success: function (data) {
            console.log(data);
            $('#showplace').append($('<p>', {
                text: data.loc.name
            }));
            $('#showplace').append($('<p>', {
                text: data.loc.address
            }));
            $('#showplace').append($('<p>', {
                text: "Heute um 20:00"
            }));
          },
          error: function (error) {
            console.log(error);
          }
        });
      });
    });
    </script>
  @endif
@endsection
