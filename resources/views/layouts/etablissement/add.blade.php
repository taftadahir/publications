@extends('layouts.app')

@section('title')
    Ajouter un etablissement
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/add-etablissement.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
@endsection

@section('main')
    @include('layouts.navigation')
   <div class="container">
        <div class="create">
            <form action="{{ route('etablissements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <h3>Ajouter un etablissement</h3>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Intitulé de l'etablissement</span>
                         </div>
                         <div class="value">
                             <input type="text" name="intitule" required placeholder="Intitulé">
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Adresse</span>
                         </div>
                         <div class="value">
                             <input type="text" name="adresse" required placeholder="Adresse">
                         </div>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col">
                          <div class="title">
                              <span>Url</span>
                          </div>
                          <div class="value">
                              <input type="text" name="url" required placeholder="url">
                          </div>
                      </div>
                  </div>

                <div class="row actions">
                    <button type="submit">
                        <span>Create etablissement</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-dashboard')
@endsection

