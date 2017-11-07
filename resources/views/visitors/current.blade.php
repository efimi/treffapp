<div class="container">
    <h1>{{ $location->name }}</h1>
    <h3>Heute 20:00</h3>
    <br>
    @include('locations.map', $location)
    <p> Derzeit kommen noch {{ $location->used_places-1 }} weitere Person/en zu deiner Location! :) </p>
</div>