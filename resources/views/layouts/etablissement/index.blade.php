@extends('dashboard')

@section('title-page')
    Tous les Etablissements
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
                    <span>Etablissements</span>
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
                                <span>Intitulé</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Adresse</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span id="date_pub">Url</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                            <th>
                                <span>Actions</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etablissements as $etablissement)
                            <tr>
                                <td>{{$etablissement->id}}</td>
                                <td>{{$etablissement->intitule}}</td>
                                <td>{{$etablissement->adresse}}</td>
                                <td>{{ $etablissement->url }}</td>
                                <td class="actions">
                                    <a href="{{ route('etablissements.edit',['etablissement'=>$etablissement->id]) }}">
                                        modifier
                                    </a>
                                    <form action="{{ route('etablissements.destroy',['etablissement'=>$etablissement->id]) }}" method="POST">
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
