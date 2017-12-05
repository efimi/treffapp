@extends('layouts.master_static')

@section('content')
    <div class="jumbotron no-margin no-padding-bottom">
        <p>Heute ist {{ $today }}</p>
        @if(Auth::check())
            @if(empty(Auth::user()->last_click()) OR Auth::user()->last_click()->date != Carbon\Carbon::now()->toDateString())
                <p class="lead">Drücke auf den Button</p>
                <p class="lead">und finde heraus wo es heute für dich hingeht</p>
                <label class="checkbox-inline"><input type="checkbox" id="together">Wir kommen zu zweit.</label>
                <br>
                <div class="btn btn-primary" role="button" id="button"><span class="inner"> Let's Go! </span></div>
            @endif
        @endif
    </div>

    <div class="jumbotron" id="resultview">
        <div id="database_entry">
            @if(Auth::check())
                @if(!empty(Auth::user()->last_click()) AND Auth::user()->last_click()->date == Carbon\Carbon::now()->toDateString())
                    @include('visitors.current', $location = \App\Location::find(Auth::user()->last_click()->location_id))
                @endif
            @endif
            <br>
            <p>Bitte überprüfe deine Profilemail, damit wir dich benachrichtigen können, falls sich die Location ändern sollte.

            </p>
        </div>
    </div>
    @if(!$location)
        <script src="js/buttonclick.js"></script>
    @endif
@endsection
