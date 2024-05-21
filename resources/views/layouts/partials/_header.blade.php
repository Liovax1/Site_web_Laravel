<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #c7ccd9">
    <div class="container-fluid">
        <a class="navbar-brand custom-navbar-brand text-dark" href="{{ route('accueil') }}"> 
            <img src="{{ asset('storage/' .Voyager::setting('site.logo')) }}" title="Accueil" alt="Logo" width="55" height="50"></a>
            <a class="navbar-brand custom-navbar-brand text-dark" href="{{ route('accueil') }}">Accueil<span class="vertical-bar"></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('listeDesVilles') }}">Liste des Villes</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    @if(auth()->user()->hasRole('admin'))

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownGestions" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestion</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownGestions">
                            <li><a class="dropdown-item" href="{{ route('gestionUser') }}">Gestion des Utilisateurs</a></li>
                            <li><a class="dropdown-item" href="{{ route('villes') }}">Gérer les Villes</a></li>
                            <li><a class="dropdown-item" href="{{ route('tousLesParkings') }}">Gérer les Parkings</a></li>
                            <li><a class="dropdown-item" href="{{ route('tousLesNoeudsLoras') }}">Gérer les Noeuds</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('apropos') }}">A propos</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {!! Auth::user()->name !!} - Role : {!! Auth::user()->role->name !!}
                        </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Se déconnecter</button>
                        </form>
                    </li>
                    </ul>
                    </li>

                @elseif(auth()->user()->hasRole('gestionnaire_parking'))
                
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownGestions" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestion</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownGestions">
                            <li><a class="dropdown-item" href="{{ route('tousLesParkings') }}">Gérer les Parkings</a></li>
                            <li><a class="dropdown-item" href="{{ route('tousLesNoeudsLoras') }}">Gérer les Noeuds</a></li>
                        </ul>
                    </li>
                    
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('apropos') }}">A propos</a>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {!! Auth::user()->name !!} - Role : {!! Auth::user()->role->name !!}
                        </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Se déconnecter</button>
                        </form>
                    </li>
                    </ul>
                    </li>

                @elseif(auth()->user()->hasRole('gestionnaire_place_parking'))
                
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('tousLesParkings') }}">Ajuster place</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('apropos') }}">A propos</a>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {!! Auth::user()->name !!} - Role : {!! Auth::user()->role->name !!}
                        </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Se déconnecter</button>
                        </form>
                    </li>
                    </ul>
                    </li>

                @endif
                @endauth
            </ul>

            @guest
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('apropos') }}">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('connexion') }}">Connexion</a>
                </li>
            </ul>
            @endguest

        </div>
    </div>
</nav>
