


    @if (Auth::guest())
    {{-- <li class="nav-item">
      <a class="nav-link" href="/login">Login</a>
    </li> --}}
    @else
      <div class="header clearfix">
        <nav>
        <ul class="nav nav-pills float-right">
          <li class="nav-item">
            <a class="nav-link" href="/">Treffpunkte bearbeiten</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/spieler">Treffpunkte anzeigenlassen</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/table">Aktuelle Statistik</a>
          </li>

      <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
              Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
    @endif



  </ul>
{{-- </nav>
    <h3 class="text-muted hidden-xs hidden-sm"><a href="/" class="nav-link hidden-xs hidden-sm">Badminton Planing Tool</a></h3>
</div> --}}
