{{--  Nav 1  --}}
<div class="nav-container">
    <nav class="container">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ url('/uploads/images/logo.png') }}" alt="No photo">
            </a>
        </div>
        @auth
            <div class="menu">
                <ul>
                    <li>
                        <button>Menu</button>
                        <div class="sub-menu">
                            <div class="items-container">
                                <div class="title no-selectable-text">
                                    <h3>Ajouter</h3>
                                </div>
                                <div class="items">
                                    <a href="{{route('articles.create') }}">Ajouter un article</a>
                                    <a href="{{route('auteurs.create') }}">Ajouter un auteur</a>
                                    <a href="{{ route('equipes.create') }}">Ajouter une equipe</a>
                                    <a href="{{ route('etablissements.create')}}">Ajouter un etablissement</a>
                                    <a href="{{ route('laboratoires.create')}}">Ajouter un laboratoire</a>
                                </div>
                            </div>
                            <div class="items-container">
                                <div class="title no-selectable-text">
                                    <h3>Voir</h3>
                                </div>
                                <div class="items">
                                    <a href="{{ route('articles.index')}}">Voir tous les articles</a>
                                    <a href="{{ route('equipes.index')}}">Voir tous les equipes</a>
                                    <a href="{{ route('auteurs.index')}}">Voir tous les auteurs</a>
                                    <a href="{{ route('etablissements.index')}}">Voir tous les etablissements</a>
                                    <a href="{{ route('laboratoires.index')}}">Voir tous les laboratoires</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </nav>
</div>

{{--  Nav 2  --}}
