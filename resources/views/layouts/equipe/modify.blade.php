@extends('dashboard')

@section('title-page')
    Modifier une equipe
@endsection

@section('links-dashboard')
    <style>
        .create-equipe {
            margin-top: 2rem;
        }

        .create-equipe form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .create-equipe form .row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .create-equipe form .row.title {
            justify-content: center;
            margin-bottom: 2rem;
        }

        .create-equipe form .row.title span {
            font-size: 3rem;
            font-weight: 600;
        }

        .create-equipe form .row .col {
            width: 49%;
            margin-bottom: 2.5rem;
        }

        .create-equipe form .row .col * {
            width: 100%;
        }

        .create-equipe form .row .col textarea {
            resize: none;
            font-size: 1.8rem;
            height: 10rem;
            padding: .5rem 1rem;
            border: none;
            outline: none;
        }

        .create-equipe form .row .col .title {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 400;
        }

        .create-equipe form .row .col select,
        .create-equipe form .row .col input {
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

        .create-equipe form .row.actions {
            justify-content: flex-end;
        }

        .create-equipe form .row.actions button {
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

        .create-equipe form .row.actions button:hover {
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
    <div class="create-equipe">
        <form action="{{ route('equipes.update',['equipe'=>$equipe->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row title">
                <div class="principal-title">
                    <span>Ajouter une equipe</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                     <div class="title">
                         <span>Nom de l'equipe</span>
                     </div>
                     <div class="value">
                         <input type="text" name="nom_equipe" required placeholder="Nom de l'equipe" value="{{ $equipe->nom_equipe }}">
                     </div>
                </div>
                <div class="col">
                     <div class="title">
                         <span>Laboratoire</span>
                     </div>
                     <div class="value">
                        <select name="laboratoire_id">
                            @foreach ($laboratoires as $laboratoire)
                               <option value="{{ $laboratoire->id }}" @if ($equipe->laboratoire->id == $laboratoire->id)
                                    checked
                               @endif>{{ $laboratoire->nom_laboratoire }}</option>
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
                                <option value="{{ $responsable->id }}"
                                    @if ($equipe->auteur->id == $responsable->id)
                                        checked
                                    @endif>{{ $responsable->nom }} {{ $responsable->prenom }}</option>
                            @endforeach
                       </select>
                    </div>
                </div>
                <div class="col">
                     <div class="title">
                         <span>Ajouter des auteurs</span>
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
                    <span>Save equipe</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts-dashboard')
@endsection

