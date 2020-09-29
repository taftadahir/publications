@extends('dashboard')

@section('title-page')
    Modifier un article
@endsection

@section('links-dashboard')
    <style>
        .create-article {
            margin-top: 2rem;
        }

        .create-article form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .create-article form .row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .create-article form .row.title {
            justify-content: center;
            margin-bottom: 2rem;
        }

        .create-article form .row.title span {
            font-size: 3rem;
            font-weight: 600;
        }

        .create-article form .row .col {
            width: 49%;
            margin-bottom: 2.5rem;
        }

        .create-article form .row .col * {
            width: 100%;
        }

        .create-article form .row .col textarea {
            resize: none;
            font-size: 1.8rem;
            height: 10rem;
            padding: .5rem 1rem;
            border: none;
            outline: none;
        }

        .create-article form .row .col .title {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 400;
        }

        .create-article form .row .col select,
        .create-article form .row .col input {
            height: 3.5rem;
            padding: .5rem 1rem;
            font-size: 1.6rem;
            font-weight: 300;
            border: none;
            outline: none;
            border-radius: .5rem;
            -webkit-border-radius: .5rem;
            -moz-border-radius: .5rem;
            -ms-border-radius: .5rem;
            -o-border-radius: .5rem;
        }

        .create-article form .row.actions {
            justify-content: flex-end;
        }

        .create-article form .row.actions button {
            border: 1px solid var(--color-black-primary);
            padding: .5rem 2rem;
            font-size: 1.8rem;
            font-weight: 500;
            border-radius: .5rem;
            -webkit-border-radius: .5rem;
            -moz-border-radius: .5rem;
            -ms-border-radius: .5rem;
            -o-border-radius: .5rem;
            cursor: pointer;
            transition: all 300ms linear;
            -webkit-transition: all 300ms linear;
            -moz-transition: all 300ms linear;
            -ms-transition: all 300ms linear;
            -o-transition: all 300ms linear;
        }

        .create-article form .row.actions button:hover {
            border-color: var(--color-orange-primary);
            color: var(--color-orange-primary);
        }

        .auteurs{
            height: 10rem !important;
        }
    </style>
@endsection

@section('content')
   <div class="container">
        <div class="create-article">
            <form action="{{ route('articles.update', ['article'=>$article->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row title">
                    <div class="principal-title">
                        <span>Modifier un article</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Titre</span>
                         </div>
                         <div class="value">
                             <textarea name="titre"  required placeholder="Titre" >{{ $article->titre }}</textarea>
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Date de publication</span>
                         </div>
                         <div class="value">
                             <input type="date" name="date_publication"  value="{{ $article->date_publication }}">
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Genre</span>
                         </div>
                         <div class="value">
                            <select name="genre">
                                <option value="journal" @if ($article->genre == 'journal')
                                    checked
                                @endif>Journal</option>
                                <option value="conference" @if ($article->genre == 'conference')
                                    checked
                                @endif>Conference</option>
                            </select>
                         </div>
                   </div>
                   <div class="col">
                        <div class="title">
                            <span>Url</span>
                        </div>
                        <div class="value">
                           <input type="text" name="url"  placeholder="Url" value="{{ $article->url }}">
                        </div>
                  </div>
                </div>
                <div class="row">
                   <div class="col">
                        <div class="title">
                            <span>Auteurs</span>
                        </div>
                        <div class="value">
                            <select name="auteurs[]" multiple  class="auteurs">
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
                        <span>Modifier article</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-dashboard')
@endsection

