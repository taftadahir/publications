@extends('dashboard')

@section('title-page')
    Tous les articles
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
                    <span>Articles</span>
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
                                <span>Titre</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Genre</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span id="date_pub">Date de publication</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Url</span>
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
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>{{$article->titre}}</td>
                                <td>{{$article->genre}}</td>
                                <td>{{$article->date_publication}}</td>
                                <td><a href="{{$article->url}}" target="_blank">{{$article->url}}</a></td>
                                <td>
                                    @foreach ($article->auteurs as $auteur)
                                        <span>
                                            @if (strlen($auteur->nom)>0)
                                            {{ $auteur->nom[0] }}.
                                            @endif{{ $auteur->prenom }},</span>
                                    @endforeach
                                </td>
                                <td class="actions">
                                    <a href="{{ route('articles.edit',['article'=>$article->id]) }}">
                                        modifier
                                    </a>
                                    <form action="{{ route('articles.destroy',['article'=>$article->id]) }}" method="POST">
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
