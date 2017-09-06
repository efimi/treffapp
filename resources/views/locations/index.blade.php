@extends('layouts.master_static')

@section('content')
<div class="jumbotron">
    @if(isset($success) AND $success)
        <div class="bg-success well-lg col-md-12 col-xs-12 col-sm-12">
            Ihre Anmeldung war Erfolgreich!
        </div>
    @endif
    @foreach ($all as $location)
        <a href="locations/{{ $location->id }}"><h1>{{ $location->name }}</h1></a>

    @endforeach
</div>

@endsection
