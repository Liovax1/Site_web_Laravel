<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('accueil') }}">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                @if(auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="#">Gestion des utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Villes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Parkings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Noeuds Lora</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apropos') }}">A propos</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Se déconnecter</button>
                    </form>
                </li>

                @elseif(auth()->user()->hasRole('gestionnaire_parking'))
                <li class="nav-item">
                    <a class="nav-link" href="#">Villes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Parkings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Noeuds Lora</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apropos') }}">A propos</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Se déconnecter</button>
                    </form>
                </li>

                @elseif(auth()->user()->hasRole('gestionnaire_place_parking'))
                <li class="nav-item">
                    <a class="nav-link" href="#">Ajuster place</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apropos') }}">A propos</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Se déconnecter</button>
                    </form>
                </li>

                @endif
                @endauth

                @guest

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('connexion') }}">Connexion</a>
                    </li>
                </ul>


                @endguest

            </ul>
        </div>
    </div>
</nav>