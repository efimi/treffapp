<nav class="container">
    <ul class="navbar-right text-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
        @else
            <a href="#" class="btn " role="button" aria-expanded="ture">
                {{ Auth::user()->name }}
            </a>
            <br>
            <a class="btn btn-info" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </ul>
    @include('layouts.components.logo')
</nav>
