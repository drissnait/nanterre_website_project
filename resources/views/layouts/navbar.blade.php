@php
use Illuminate\Support\Facades\Auth;
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">
        Paris Nanterre
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <a class="nav-link ml-2" href="{{action('PlanningController@index')}}">Planning</a>
            @if(Auth::check())
            <a class="nav-link ml-2" href="{{action('ComposanteController@index')}}">Composantes</a>
            <a class="nav-link ml-2" href="{{action('FormationController@index')}}">Formations</a>
            <a class="nav-link ml-2" href="{{action('IndividuController@index')}}">Individus</a>
            <a class="nav-link ml-2" href="{{action('GroupeController@index')}}">Groupes</a>
            <a class="nav-link ml-2" href="{{action('SeanceController@index')}}">Séances</a>
            <a class="nav-link ml-2" href="{{action('SalleController@index')}}">Salles</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Import - Export
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{action('IndividuController@export')}}">Export des données</a>
                    <a class="dropdown-item" href="{{ route('import') }}">Import des données</a>
                </div>
            </li>
            @endif
        </ul>
        @if(Auth::check())
            <a class="btn btn-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('Déconnexion') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @elseif(!Auth::check() && Request::path() != 'login')
            <a class="btn btn-success" href="{{ route('login') }}">Connexion</a>
        @endif
    </div>
</nav>

<!-- <p style=" position: absolute; bottom: 0; left: 0; width: 100%; text-align: center;">Développé par : Driss NAIT BELKACEM - Sekan TAS - Léa Habert.</p> -->
