<div class="container">

    <p>Wir haben für dich</p>
    <h1>{{ $location->name }}</h1>
    <p>ausgesucht!!!</p>

    <p>Bestätige innerhalb von 5 Sekunden, dass du teilnhemen willst!</p>
    @include('locations.map', $location)
    @if ($location->used_places() - 1 == -1)
    @else
        <p> Derzeit kommen noch {{ $location->used_places() }} weitere Personen zum {{ $location->name }}! :) </p>
    @endif
    <button class="btn btn-primary" type="button" name="confirmButton" data-amount="{{ $amount }}"> Ich gehe hin! </button>
    <div id="returnMessage">

    </div>
</div>
