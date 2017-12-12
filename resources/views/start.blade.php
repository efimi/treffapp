@extends('layouts.master_static')

@section('content')
    <div class="jumbotron no-margin no-padding-bottom">
    <p>Heute ist {{ $today }}</p>
    </div>
    @if(Auth::check())
        @unless(Auth::user()->hasLocationAlready())
            <div class="jumbotron no-margin no-padding-bottom" id="startBox">
                @if(Auth::user()->canPress())
                    <p class="lead">Drücke auf den Button</p>
                    <p class="lead">und finde heraus wo es heute für dich hingeht</p>
                    <label class="checkbox-inline"><input type="checkbox" id="together">Wir kommen zu zweit.</label>
                    <br><br>
                    <div class="btn btn-primary" role="button" id="button"><span class="inner"> Let's Go! </span></div>
                @else
                    <p class="lead">Versuche es in {{Auth::user()->minutesTillPressAllowed() }} Minuten nocheinmal</p>
                    <a href="http://www.padermeet.dev"> Lade die Seite nocheinmal neu.</a>
                @endif
            </div>
        @endunless
        <div class="jumbotron" id="resultview">
            <div id="database_entry">
                    @if(Auth::user()->hasLocationAlready())
                        @include('visitors.current', $location = Auth::user()->matchedLocation())
                    @endif
                <br>
                <div id="confrimButton"></div>
                <p>Bitte überprüfe deine Profilemail, damit wir dich benachrichtigen können, falls sich die Location ändern sollte.</p>
            </div>
        </div>
    @endif

    @if(empty(Auth::user()->hasLocationAlready()))
        <script src="js/buttonclick.js"></script>
    @endif
@endsection
