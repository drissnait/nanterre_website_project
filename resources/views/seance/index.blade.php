@extends('app')

@section('title', 'Séances')

@section('main')
<div class="container mb-5">
    <div class="row justify-content-md-center mt-3 mb-3">
        <div class="col-md-7">
            <h1 class="mb-3">Liste des séances</h1>
            <a href="{{ action('SeanceController@create') }}" class="btn btn-primary btn-block">Ajouter une séance</a>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-7">
            <ul class="list-group">
                @foreach($seances as $seance)
                    <a class="list-group-item list-group-item-action" href="{{ action('SeanceController@edit', [$seance->id_seance]) }}">
                        <span class="font-weight-bold">{{ $seance->libelle_groupe }}</span>
                        @if($seance->id_individu != null)
                            - {{ $seance->prenom_individu }} {{ strtoupper($seance->nom_individu) }}
                        @endif
                        @if($seance->date_debut_seance != null)
                            - {{ date('d/m/y H\hi', strtotime($seance->date_debut_seance)) }}
                            @if($seance->date_fin_seance != null)
                                - {{ date('H\hi', strtotime($seance->date_fin_seance)) }}
                            @endif
                        @endif
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
