@if (Auth::check())
    <text>Hallo {{ Auth::user()->name }}!</text>
@endif
