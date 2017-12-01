@extends('layouts.master_static')

@section('content')
    <h1>{{$user->name}}</h1>

    <p>Email für Benachrichtigungen</p>
    <p>Derzeit hinterleget Email</p>
    <p>{{ $user->email}}</p>
    <form class="text" action="/user" method="post">
        {{ csrf_field() }}
        <label for="Email">Email</label>
        <input type="email" name="email" value="" placeholder="{{ $user->email }}">
        <button type="submit" name="button">anpassen</button>
    </form>
@endsection
