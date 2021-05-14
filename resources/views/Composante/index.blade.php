@extends('app')

@section('title', 'Composantes')

@section('main')
<div class="container mb-5">
    <div class="row justify-content-md-center mt-3 mb-3">
        <div class="col-md-7">
            <h1 class="mb-3">Liste des composantes</h1>
            <a href="{{ action('ComposanteController@create') }}" class="btn btn-primary btn-block">Ajouter une composante</a>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-7">
            <ul class="list-group">
                @foreach($composantes as $c)
                    <a class="list-group-item list-group-item-action font-weight-bolder" href="{{ action('ComposanteController@edit', [$c->id_composante]) }}">{{ $c->libelle_composante }}</a>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
