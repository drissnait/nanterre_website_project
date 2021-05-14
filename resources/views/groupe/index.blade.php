@extends('app')

@section('title', 'Groupes')

@section('main')
<div class="container mb-5">
    <div class="row justify-content-md-center mt-3 mb-3">
        <div class="col-md-7">
            <h1 class="mb-3">Liste des groupes</h1>
            <a href="{{ action('GroupeController@create') }}" class="btn btn-primary btn-block">Ajouter un groupe</a>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-7">
            <ul class="list-group">
                @foreach($groupes as $groupe)
                    <a class="list-group-item list-group-item-action font-weight-bolder" href="{{ action('GroupeController@edit', [$groupe->id_groupe]) }}">{{ $groupe->libelle_groupe }}</a>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
