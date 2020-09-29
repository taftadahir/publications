@extends('layouts.app')

@section('title')
    Ajouter une equipe
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/add-equipe.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
@endsection

@section('main')
@include('layouts.navigation')
   <div class="container">
        <div class="create">
            <form action="{{ route('equipes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <h3>Ajouter une equipe</h3>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Nom de l'equipe</span>
                         </div>
                         <div class="value">
                             <input type="text" name="nom_equipe" required placeholder="Nom de l'equipe">
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Laboratoire</span>
                         </div>
                         <div class="value">
                            <select name="laboratoire_id">
                                @foreach ($laboratoires as $laboratoire)
                                   <option value="{{ $laboratoire->id }}">{{ $laboratoire->nom_laboratoire }}</option>
                                @endforeach
                            </select>
                         </div>
                   </div>
                 </div>
                <div class="row">
                   <div class="col">
                        <div class="title">
                            <span>Responsible</span>
                        </div>
                        <div class="value">
                           <select name="responsable">
                                @foreach ($responsables as $responsable)
                                    <option value="{{ $responsable->id }}">{{ $responsable->nom }} {{ $responsable->prenom }}</option>
                                @endforeach
                           </select>
                        </div>
                  </div>
                  <div class="col">
                       <div class="title">
                           <span>Ajouter des auteurs</span>
                       </div>
                       <div class="value">
                          <select name="auteurs[]" multiple  class="multiple">
                            <option value="0">Nothing</option>
                              @foreach ($auteurs as $auteur)
                                <option value="{{ $auteur->id }}">{{ $auteur->nom }} {{ $auteur->prenom }}</option>
                              @endforeach
                          </select>
                       </div>
                 </div>
                </div>

                <div class="row actions">
                    <button type="submit">
                        <span>Create equipe</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-dashboard')
@endsection

