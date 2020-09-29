@extends('dashboard')

@section('title-page')
    Modifier un laboratoire
@endsection

@section('links-dashboard')
    <style>
        .create-laboratoire {
            margin-top: 2rem;
        }

        .create-laboratoire form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .create-laboratoire form .row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .create-laboratoire form .row.title {
            justify-content: center;
            margin-bottom: 2rem;
        }

        .create-laboratoire form .row.title span {
            font-size: 3rem;
            font-weight: 600;
        }

        .create-laboratoire form .row .col {
            width: 49%;
            margin-bottom: 2.5rem;
        }

        .create-laboratoire form .row .col * {
            width: 100%;
        }

        .create-laboratoire form .row .col textarea {
            resize: none;
            font-size: 1.8rem;
            height: 10rem;
            padding: .5rem 1rem;
            border: none;
            outline: none;
        }

        .create-laboratoire form .row .col .title {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 400;
        }

        .create-laboratoire form .row .col select,
        .create-laboratoire form .row .col input {
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

        .create-laboratoire form .row.actions {
            justify-content: flex-end;
        }

        .create-laboratoire form .row.actions button {
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

        .create-laboratoire form .row.actions button:hover {
            border-color: var(--color-orange-primary);
            color: var(--color-orange-primary);
        }
    </style>
@endsection

@section('content')
   <div class="container">
        <div class="create-laboratoire">
            <form action="{{ route('laboratoires.update', ['laboratoire'=>$laboratoire->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row title">
                    <div class="principal-title">
                        <span>Modifier un laboratoire</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Nom du laboratoire</span>
                         </div>
                         <div class="value">
                             <input type="text" name="nom_laboratoire" required placeholder="Nom du laboratoire" value="{{ $laboratoire->nom_laboratoire }}">
                         </div>
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
                                   <option value="{{ $etablissement->id }}"
                                       @if ( $laboratoire->etablissement->id == $etablissement->id)
                                        checked
                                       @endif>{{ $etablissement->intitule }}</option>
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
                                   <option value="{{ $directeur->id }}"
                                       @if ($laboratoire->directeur->id == $directeur->id)
                                        checked
                                       @endif>{{ $directeur->nom }} {{ $directeur->prenom }}</option>
                                @endforeach
                            </select>
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

