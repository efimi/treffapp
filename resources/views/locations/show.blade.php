@extends('layouts.master_static')

@section('content')
<div class="jumbotron">
    <a href="{{url('/')}}/locations">zurück</a>
    <h2>{{ $location->name }}</h2>
    <h2>{{ $location->address }}</h2>
    <br>
    <div class="embed-responsive embed-responsive-16by9 col-xs-12 text-center">
          <iframe
          width="600"
          height="450"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDpSUaKc9vuFsHzWM60PxQu2jzfmvLL6wE
            &q={{!! $location->address !!}},Paderborn" allowfullscreen>
        </iframe>
    </div>
    <br>
    <h3>Geschlossen am {{ $closed_on }}</h3>
    <br>
    <a href="{{ $location->url}}"> weitere Infos..</a>
</div>
@endsection
