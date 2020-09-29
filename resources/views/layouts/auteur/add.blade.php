@extends('layouts.app')
@section('title')
    Ajouter un auteur
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
    {{--  <link rel="stylesheet" href="{{ asset('css/add-auteur.css') }}">  --}}
@endsection

@section('main')
    @include('layouts.navigation')
   <div class="container">
        <div class="create">
            <form action="{{ route('auteurs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <h3>Ajouter un auteur</h3>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Nom</span>
                         </div>
                         <div class="value">
                             <input type="text" name="nom" required placeholder="Nom">
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Prenom</span>
                         </div>
                         <div class="value">
                             <input type="text" name="prenom" required placeholder="Prenom">
                         </div>
                     </div>
                 </div>
                 <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Som</span>
                         </div>
                         <div class="value">
                            <input type="text" name="som"  placeholder="Som">
                         </div>
                   </div>
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
                </div>

                <div class="row actions">
                    <button type="submit">
                        <span>Create auteur</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/navigation.js') }}"></script>
@endsection

