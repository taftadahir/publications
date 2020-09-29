@extends('dashboard')

@section('title-page')
    Modifier un auteur
@endsection

@section('links-dashboard')
    <style>
        .create-auteur {
            margin-top: 2rem;
        }

        .create-auteur form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .create-auteur form .row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .create-auteur form .row.title {
            justify-content: center;
            margin-bottom: 2rem;
        }

        .create-auteur form .row.title span {
            font-size: 3rem;
            font-weight: 600;
        }

        .create-auteur form .row .col {
            width: 49%;
            margin-bottom: 2.5rem;
        }

        .create-auteur form .row .col * {
            width: 100%;
        }

        .create-auteur form .row .col textarea {
            resize: none;
            font-size: 1.8rem;
            height: 10rem;
            padding: .5rem 1rem;
            border: none;
            outline: none;
        }

        .create-auteur form .row .col .title {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 400;
        }

        .create-auteur form .row .col select,
        .create-auteur form .row .col input {
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

        .create-auteur form .row.actions {
            justify-content: flex-end;
        }

        .create-auteur form .row.actions button {
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

        .create-auteur form .row.actions button:hover {
            border-color: var(--color-orange-primary);
            color: var(--color-orange-primary);
        }
    </style>
@endsection

@section('content')
   <div class="container">
        <div class="create-auteur">
            <form action="{{ route('auteurs.update', ['auteur'=>$auteur->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row title">
                    <div class="principal-title">
                        <span>Modifier un auteur</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Nom</span>
                         </div>
                         <div class="value">
                             <input type="text" name="nom" required placeholder="Nom" value="{{ $auteur->nom }}">
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Prenom</span>
                         </div>
                         <div class="value">
                             <input type="text" name="prenom" required placeholder="Prenom" value="{{ $auteur->prenom }}">
                         </div>
                     </div>
                 </div>
                 <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Som</span>
                         </div>
                         <div class="value">
                            <input type="text" name="som"  placeholder="Som" value="{{ $auteur->som }}">
                         </div>
                   </div>
                   <div class="col">
                        <div class="title">
                            <span>Etablissement</span>
                        </div>
                        <div class="value">
                            <select name="etablissement_id">
                                @foreach ($etablissements as $etablissement)
                                   <option value="{{ $etablissement->id }}" @if ($auteur->etablissement->id == $etablissement->id)
                                        checked
                                   @endif>{{ $etablissement->intitule }}</option>
                                @endforeach
                            </select>
                        </div>
                  </div>
                </div>

                <div class="row actions">
                    <button type="submit">
                        <span>Modifier un auteur</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-dashboard')
@endsection

