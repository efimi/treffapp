@extends('layouts.master')

@section('content')

  <div class="jumbotron">

    <h1>Treffapp</h1>
    <p class="lead">Drücke auf den Button </p>
    <p class="">und finde heraus wo es heute für dich hingeht</p>

    <p>
        @if ($location)
          <div class="btn btn-lg btn-primary" role="button" id="button" disabled="disabled">  Wir warten auf dich :)  </div>
          @else
            <div class="btn btn-lg btn-primary" role="button" id="button" disabled="disabled">  Let's Go!  </div>
          @endif
    </p>


    <div id="showplace">

        <div id="database_entry">
            @if($location)
              <p>{{ $location->name }}</p>
              <p>{{ $location->id }}</p>
              <p> Heute 20:00</p>
              <div id="current_matched">
                <?php // TODO: ajax call from database ?>
              </div>
          @endif
        </div>
    </div>

  </div>

  <div class="jumbotron">
    <p>Deine IP:   {{ request()->ip() }}</p>

    <p> Deine Jetzige Session ID:</p>
    <small>  {{ Session::getId() }}</small>
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
        var btn = $(this);
        btn.text('Deine Location wird gesucht:');
        btn.attr('disabled','disabled');
        $('#database_entry').hide();

        $.ajax({
          url: 'getplace',
          method: 'get',
          success: function (data) {
            console.log(data);

            $('#database_entry').append($('<p>', {
                text: data.loc.name
            }));
            $('#database_entry').append($('<p>', {
                text: data.loc.id
            }));
            $('#database_entry').append($('<p>', {
                text: "Heute um 20:00"
            }));

          },
          error: function (error) {
            console.log(error);
          },
          complete: function (){
            $('#database_entry').fadeIn(300);
            // TODO: Change Text to something else
            btn.text('Viel Spass!');
          }
        });



      });

    });
    </script>
  @endif
@endsection
