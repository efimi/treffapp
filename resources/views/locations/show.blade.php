@extends('layouts.master_static')

@section('content')
<div class="jumbotron">
    <a href="{{url('/')}}/locations">zurück</a>
    <h2>{{ $location->name }}</h2>
    <h2>{{ $location->address }}</h2>
    <br>

    @include('locations.map', $location)
    <img class="embed-responsive embed-responsive-16by9 col-xs-12 text-center" src="{{ $location->logo_path }}" alt="So sehen wir aus">
    <br>
    <h3>Geschlossen am {{ $closed_on }}</h3>
    <br>
    <a href="{{ $location->url}}"> weitere Infos..</a>
</div>
@endsection
