@extends('layouts.app')

@section('title')
    Ajouter un article
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/add-article.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
@endsection

@section('main')
    @include('layouts.navigation')
   <div class="container">
        <div class="create">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <h3>Ajouter un article</h3>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Titre</span>
                         </div>
                         <div class="value">
                            <textarea name="titre" cols="30" rows="10" required placeholder="Titre" ></textarea>
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Auteurs</span>
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
                 <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Type</span>
                         </div>
                         <div class="value">
                            <select name="type">
                                <option value="journal">Journal</option>
                                <option value="conference">Conference</option>
                            </select>
                         </div>
                   </div>
                   <div class="col">
                        <div class="title">
                            <span>Source</span>
                        </div>
                        <div class="value">
                           <input type="text" name="source"  placeholder="Source">
                        </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Url</span>
                         </div>
                         <div class="value">
                            <input type="text" name="url"  placeholder="Url">
                         </div>
                   </div>
                   <div class="col">
                        <div class="title">
                            <span>Date de publication</span>
                        </div>
                        <div class="value">
                            <input type="date" name="date_publication" >
                        </div>
                   </div>
               </div>

                <div class="row actions">
                    <button type="submit">
                        <span>Ajouter article</span>
                    </button>
                </div>
            </form>
        </div>

        <div class="create">
            <form action="{{ route('articles.store_csv') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <h3>Ajouter en utilisant un fichier excel</h3>
                </div>
                 <div class="row">
                   <div class="col">
                        <div class="value">
                           <input type="file" name="file_csv" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="value error">
                            <span>{{ $errors->first('file_csv')}}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                         <div class="value check">
                            <input type="checkbox" name="header" checked id="header-check">
                            <label for="header-check">
                                File contains header row?
                            </label>
                         </div>
                     </div>
                 </div>


                <div class="row actions">
                    <button type="submit">
                        <span>Importer</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/navigation.js') }}"></script>
@endsection

