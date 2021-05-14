@extends('app')

@section('title', 'Formations')

@section('main')
<div class="container mb-5">
    <div class="row justify-content-md-center mt-3 mb-3">
        <div class="col-md-7">
            <h1 class="mb-3">Liste des formations</h1>
            <a href="{{ action('FormationController@create') }}" class="btn btn-primary btn-block">Ajouter une formation</a>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-7">
            <ul class="list-group">
                @foreach($formations as $formation)
                    <a class="list-group-item list-group-item-action" href="{{ action('FormationController@edit', [$formation->id_formation, $formation->vet]) }}">
                        @formationNomVersion([
                            'libelle' => $formation->libelle_formation,
                            'vet' => $formation->vet,
                            'styleLibelle' => 'font-weight-bolder',
                            'styleVet' => 'mr-2'
                        ]);
                        @endformationNomVersion
                        @foreach($formation->composantes as $composante)
                            <span class="badge badge-pill badge-secondary">{{$composante->libelle_composante}}</span>
                        @endforeach
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
