<!-- Right Side Of Navbar -->
<ul class="nav flex-column row">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item {{ \Request::is('login') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('login') }}">
                <img src="{{ asset('assets/icons/btn_pokedex.png') }}">
                {{ __('Login') }}
            </a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item {{ \Request::is('register') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('register') }}">
                    <img src="{{ asset('assets/icons/btn_pokestop.png') }}">
                    {{ __('Register') }}
                </a>
            </li>
        @endif
    @else
        {{-- {{ Auth::user()->name }} --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('userSettings') }}">
                <img src="{{ asset('assets/icons/icon_' . Auth::user()->character . '.png') }}">
                {{ Auth::user()->name }}
            </a>
        </li>

        <li class="nav-item {{ \Request::is('pokemon/inventory') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('inventory') }}">
                <img src="{{ asset('assets/icons/btn_pokedex.png') }}">
                {{ __('Inventory') }}
            </a>
        </li>
        
        <li class="nav-item {{ \Request::is('pokemon/catch-em-all') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('catchEmAll') }}">
                <img src="{{ asset('assets/icons/btn_pokestop.png') }}">
                {{ __('Catch \'em all!') }}
            </a>
        </li>
        
        <li class="nav-item {{ \Request::is('settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('userSettings') }}">
            <img src="{{ asset('assets/icons/btn_deploy_pokemon.png') }}">
                {{ __('Settings') }}
            </a>
        </li>
        
        <li class="nav-item {{ \Request::is('copyright') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('copyright') }}">
            <img src="{{ asset('assets/icons/btn_help.png') }}">
                {{ __('Copyright') }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" 
                onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
                <img src="{{ asset('assets/icons/btn_exit.png') }}">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endguest
</ul>