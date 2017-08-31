@extends('layouts.master_static')

@section('content')
<div class="jumbotron">
    @foreach ($all as $location)
        <a href="locations/{{ $location->id }}"><h1>{{ $location->name }}</h1></a>

    @endforeach
</div>

@endsection
