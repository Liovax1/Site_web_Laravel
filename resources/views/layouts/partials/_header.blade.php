<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
            <img src="{{ asset('storage/' .Voyager::setting('site.logo')) }}" title="Accueil" alt="Logo" width="55" height="50">
            <a class="navbar-brand custom-navbar-brand" href="{{ route('accueil') }}">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @auth
                    @if(auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('listeDesParkings') }}">Liste des Parkings</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownGestionsUtilisateurs" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestion des Utilisateurs</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownGestions">
                            <li><a class="dropdown-item" href="#">Ajouter un utilisateur</a></li>
                            <li><a class="dropdown-item" href="#">Modifier un utilisateur</a></li>
                            <li><a class="dropdown-item" href="#">Supprimer un utilisateur</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownGestions" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestion</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownGestions">
                            <li><a class="dropdown-item" href="{{ route('villes') }}">Gérer les Villes</a></li>
                            <li><a class="dropdown-item" href="{{ route('tousLesParkings') }}">Gérer les Parkings</a></li>
                            <li><a class="dropdown-item" href="{{ route('tousLesNoeudsLoras') }}">Gérer les Noeuds</a></li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('apropos') }}">A propos</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-dark">Se déconnecter</button>
                        </form>
                    </li>

                @elseif(auth()->user()->hasRole('gestionnaire_parking'))
                <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('listeDesParkings') }}">Liste des Parkings</a>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownGestions" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestion</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownGestions">
                            <li><a class="dropdown-item" href="{{ route('villes') }}">Gérer les Villes</a></li>
                            <li><a class="dropdown-item" href="{{ route('tousLesParkings') }}">Gérer les Parkings</a></li>
                            <li><a class="dropdown-item" href="{{ route('tousLesNoeudsLoras') }}">Gérer les Noeuds</a></li>
                        </ul>
                    </li>
                    
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('apropos') }}">A propos</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-dark">Se déconnecter</button>
                    </form>
                </li>

                @elseif(auth()->user()->hasRole('gestionnaire_place_parking'))
                <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('listeDesParkings') }}">Liste des Parkings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Ajuster place</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('apropos') }}">A propos</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-dark">Se déconnecter</button>
                    </form>
                </li>

                @endif
                @endauth

                @guest

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('listeDesParkings') }}">Liste des Parkings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('apropos') }}">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('connexion') }}">Connexion</a>
                    </li>
                </ul>

                @endguest

            </ul>
        </div>
    </div>
</nav>