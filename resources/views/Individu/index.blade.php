@extends('app')

@section('title', 'Individus')

@section('main')
<div class="container mb-5">
    <div class="row justify-content-md-center mt-3 mb-3">
        <div class="col-md-7">
            <h1 class="mb-3">Liste des individus</h1>
            <a href="{{ action('IndividuController@create') }}" class="btn btn-primary btn-block">Ajouter un individu</a>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-7">
            <ul class="list-group">
                @foreach($individus as $i)
                    <a class="list-group-item list-group-item-action " href="{{ action('IndividuController@edit', [$i->id_individu]) }}"><span class="font-weight-bold">{{ $i->id_individu }}</span>
                    - {{ $i->prenom_individu}} {{ " " }} {{ strtoupper($i->nom_individu) }}
                    @foreach($i->types as $type)
                        <span class="badge badge-pill badge-secondary">{{$type->libelle_type_individu}}</span>
                    @endforeach
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
