<div id="current_matched">
    <br>
    @if ($location->used_places == 2)
        <p>Du bist nicht alleine!!:) Derzeit kommt noch eine weitere Person</p>
    @elseif ($location->used_places == 1)
        <p> Viel Spaß! </p>
    @else
        <p>Derzeit kommen noch {{ ($location->used_places)-1 }} weitere Personen</p>
    @endif
</div>
