@extends('dashboard')

@section('title-page')
    Tous les auteurs
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
                    <span>Auteurs</span>
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
                                <span>Nom</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Prenom</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span id="date_pub">Som</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Etablissement</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Actions</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auteurs as $auteur)
                            <tr>
                                <td>{{$auteur->id}}</td>
                                <td>{{$auteur->nom}}</td>
                                <td>{{$auteur->prenom}}</td>
                                <td>{{$auteur->som}}</td>
                                <td>
                                    @if ($auteur->etablissement)
                                        {{$auteur->etablissement->intitule}}
                                    @endif
                                </td>
                                <td class="actions">
                                    <a href="{{ route('auteurs.edit',['auteur'=>$auteur->id]) }}">
                                        modifier
                                    </a>
                                    <form action="{{ route('auteurs.destroy',['auteur'=>$auteur->id]) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts-dashboard')
<script src="{{ asset('js/search-result.js') }}"></script>
@endsection
