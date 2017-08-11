@extends('layouts.master')

@section('content')

  <div class="jumbotron" id="startlogo">

    <h1>Treffapp</h1>
    <p class="lead">Drücke auf den Button </p>
    <p class="">und finde heraus wo es heute für dich hingeht</p>

    <p>
        @if ($location)
          <div class="btn btn-lg btn-primary" role="button" id="button" disabled="disabled">  Wir warten auf dich :)  </div>
          @else
            <div class="btn btn-lg btn-primary" role="button" id="button">  Let's Go!  </div>
          @endif
    </p>




  </div>

  <div class="jumbotron">
    <div id="showplace">

        <div id="database_entry">
            @if($location)
              <p>{{ $location->name }}</p>
              <div>{{ $location->googlemaps_frame }}</div>
              <p> Heute 20:00</p>
              <div id="current_matched">
                <?php // TODO: ajax call from database ?>
              </div>
          @endif
        </div>
    </div>

    {{-- @include('ip_debug.blade.php') --}}
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

            $('#startlogo').delay( 800 ).fadeIn( 400 );
            $('#database_entry').append($('<p>', {
                text: data.loc.name
            }));
            $('#database_entry').append($('<div>', {
                text: data.loc.googlemaps_frame
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
