@extends('layouts.master_static')

@section('content')
    @foreach($all AS $location)
        <li><a href="/location/{{ $location->id }}"> {{ $location->name }} </a></li>
    @endforeach
@endsection