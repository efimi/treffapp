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

    <h2>Meine Padermeets:</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Datum</th>
                <th>Treffpunkt</th>
                <th colspan="5">Teilnehmer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($history as $visit)
                <tr>
                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $visit->date)->format('d.m.Y') }}</td>
                    <td><a href="/location/{{ $visit->location->id }}">{{ $visit->location->name}}</a></td>
                    @foreach ($visit->getMember() as $member)
                        <td>@if (!is_null($member->user->facebook_id))
                        <a href="http://facebook.com/{{ $member->user->facebook_id }}">
                        @endif{{ $member->user->name }}
                        @if (!is_null($member->user->facebook_id))
                        </a>
                        @endif</td>
                    @endforeach

                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
