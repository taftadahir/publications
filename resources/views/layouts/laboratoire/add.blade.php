@extends('layouts.app')

@section('title')
    Ajouter un laboratoire
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/add-laboratoire.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
@endsection

@section('main')
    @include('layouts.navigation')
   <div class="container">
        <div class="create">
            <form action="{{ route('laboratoires.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <div class="principal-title">
                        <span>Ajouter un laboratoire</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Etablissement</span>
                         </div>
                         <div class="value">
                            <select name="etablissement_id">
                                @foreach ($etablissements as $etablissement)
                                   <option value="{{ $etablissement->id }}">{{ $etablissement->intitule }}</option>
                                @endforeach
                            </select>
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Directeur du laboratoire</span>
                         </div>
                         <div class="value">
                            <select name="directeur_labo">
                                @foreach ($directeurs as $directeur)
                                   <option value="{{ $directeur->id }}">{{ $directeur->nom }} {{ $directeur->prenom }}</option>
                                @endforeach
                            </select>
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Nom du laboratoire</span>
                         </div>
                         <div class="value">
                             <input type="text" name="nom_laboratoire" required placeholder="Nom du laboratoire">
                         </div>
                    </div>
                </div>

                <div class="row actions">
                    <button type="submit">
                        <span>Create laboratoire</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-dashboard')
@endsection

