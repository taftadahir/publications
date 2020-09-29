@extends('dashboard')

@section('title-page')
    Modifier un etablissement
@endsection

@section('links-dashboard')
    <style>
        .create-etablissement {
            margin-top: 2rem;
        }

        .create-etablissement form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .create-etablissement form .row {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .create-etablissement form .row.title {
            justify-content: center;
            margin-bottom: 2rem;
        }

        .create-etablissement form .row.title span {
            font-size: 3rem;
            font-weight: 600;
        }

        .create-etablissement form .row .col {
            width: 49%;
            margin-bottom: 2.5rem;
        }

        .create-etablissement form .row .col * {
            width: 100%;
        }

        .create-etablissement form .row .col textarea {
            resize: none;
            font-size: 1.8rem;
            height: 10rem;
            padding: .5rem 1rem;
            border: none;
            outline: none;
        }

        .create-etablissement form .row .col .title {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 400;
        }

        .create-etablissement form .row .col select,
        .create-etablissement form .row .col input {
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

        .create-etablissement form .row.actions {
            justify-content: flex-end;
        }

        .create-etablissement form .row.actions button {
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

        .create-etablissement form .row.actions button:hover {
            border-color: var(--color-orange-primary);
            color: var(--color-orange-primary);
        }
    </style>
@endsection

@section('content')
   <div class="container">
        <div class="create-etablissement">
            <form action="{{ route('etablissements.update', ['etablissement'=>$etablissement->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row title">
                    <div class="principal-title">
                        <span>Ajouter un etablissement</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Intitulé de l'etablissement</span>
                         </div>
                         <div class="value">
                             <input type="text" name="intitule" required placeholder="Intitulé" value="{{ $etablissement->intitule }}">
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Adresse</span>
                         </div>
                         <div class="value">
                             <input type="text" name="adresse" required placeholder="Adresse" value="{{ $etablissement->adresse }}">
                         </div>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col">
                          <div class="title">
                              <span>Url</span>
                          </div>
                          <div class="value">
                              <input type="text" name="url" required placeholder="url"  value="{{ $etablissement->url }}">
                          </div>
                      </div>
                  </div>

                <div class="row actions">
                    <button type="submit">
                        <span>Save etablissement</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-dashboard')
@endsection

