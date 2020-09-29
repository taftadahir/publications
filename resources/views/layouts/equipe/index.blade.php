@extends('dashboard')

@section('title-page')
    Tous les Equipes
@endsection

@section('links-dashboard')
    <style>
        .home.wrapper{
            margin: 0 10rem;
        }

        #date_pub {
            display: block;
            min-width: 25rem !important;
        }
        td.actions a{
            font-size: 1.4rem;
            color: var(--color-black-primary);
        }

        td.actions button{
            font-size: 1.4rem;
            border: none;
            outline: none;
            color: var(--color-black-primary);
            cursor: pointer;
            transition: all 300ms ease;
        }

        td.actions button:hover{
            color: var(--color-red-error);
        }
    </style>
@endsection

@section('content')
    <div class="home wrapper">
        @include('layouts.navigation')
        <div class="container-limit table table-container">
            <div class="search-wrapper">
                <div class="title">
                    <span>Equipes</span>
                </div>
                <div id="search-root"></div>
            </div>
            <div class="table-wrapper">
                <table class="content-table table-sortable" id="data-table">
                    <thead>
                        <tr>
                            <th>
                                <span>ID</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Nom de l'equipe</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Laboratoire</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span id="date_pub">Responsable</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Auteurs</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Actions</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($equipes)
                            @foreach ($equipes as $equipe)
                                <tr>
                                    <td>{{$equipe->id}}</td>
                                    <td>{{$equipe->nom_equipe}}</td>
                                    <td>
                                        @if ($equipe->laboratoire)
                                            {{$equipe->laboratoire->nom_laboratoire}}
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($equipe->auteurs as $auteur)
                                            <span>
                                                @if (strlen($auteur->nom)>0)
                                                    {{ $auteur->nom[0] }}.
                                                @endif{{ $auteur->prenom }},
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($equipe->responsable_labo)
                                            {{ $equipe->responsable_labo->nom }} {{ $equipe->responsable_labo->prenom }}
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('equipes.edit',['equipe'=>$equipe->id]) }}">
                                            modifier
                                        </a>
                                        <form action="{{ route('equipes.destroy',['equipe'=>$equipe->id]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts-dashboard')
<script src="{{ asset('js/search-result.js') }}"></script>
@endsection
