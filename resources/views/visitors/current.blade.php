<div class="container">
    <h1>{{ $location->name }}</h1>
    <h3>Heute 20:00</h3>
    <br>
    @include('locations.map', $location)

    @if ($location->used_places() - 1 == -1)
        <p>Viel Spass bei {{ $location->name }}!</p>
    @else
        <p> Derzeit kommen noch {{ $location->used_places() - 1 }} weitere Personen zum {{ $location->name }}! :) </p>
    @endif

        <button class="btn btn-primary hidden" type="button" name="confirmButton"> Ich gehe hin! </button>
    <div id="returnMessage">

    </div>
</div>
