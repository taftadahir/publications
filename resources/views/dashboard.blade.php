@extends('layouts.app')

@section('title-page')
    Dashboard
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('links-dashboard')
@endsection

@section('main-content')
    <div class="dashboard wrapper">
        @include('layouts.navigation')
    </div>
    <div class="nav-dash">
        <div class="content">
            <div class="link">
                <a>Ajouter</a>
                <div class="sub-link">
                    <a href="{{route('articles.create') }}">Ajouter un article</a>
                    <a href="{{route('auteurs.create') }}">Ajouter un auteur</a>
                    <a href="{{ route('equipes.create') }}">Ajouter une equipe</a>
                    <a href="{{ route('etablissements.create')}}">Ajouter un etablissement</a>
                    <a href="{{ route('laboratoires.create')}}">Ajouter un laboratoire</a>
                </div>
            </div>
            <div class="link">
                <a>Voir tous</a>
                <div class="sub-link">
                    <a href="{{ route('articles.index')}}">Voir tous les articles</a>
                    <a href="{{ route('equipes.index')}}">Voir tous les equipes</a>
                    <a href="{{ route('auteurs.index')}}">Voir tous les auteurs</a>
                    <a href="{{ route('etablissements.index')}}">Voir tous les etablissements</a>
                    <a href="{{ route('laboratoires.index')}}">Voir tous les laboratoires</a>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
@endsection

@section('scripts-links')
<script src="{{ asset('js/dashboard.js') }}"></script>
@yield('scripts-dashboard')
@endsection
