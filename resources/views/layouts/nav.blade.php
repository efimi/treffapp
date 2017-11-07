<nav class="">
    <div class="container">
            <ul class="navbar-right text-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
                    {{-- <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li> --}}
                @else

                        <a href="#" class="btn "role="button" aria-expanded="ture">
                            {{ Auth::user()->name }}
                        </a>
                        {{-- <ul class="dropdown-menu" role="menu">
                            <li>

                            </li>
                        </ul> --}}
                        <br>
                        <a class="btn btn-info"href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                @endif
            </ul>
            @include('layouts.components.logo')
        </div>

    </div>

</nav>
