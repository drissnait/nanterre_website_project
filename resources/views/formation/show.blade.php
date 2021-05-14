@extends('app')
@section('title', 'Formation - ' . $formation->libelle_formation)

@section('main')
<div class="container">
    <h1>{{ $formation->libelle_formation }}</h1>
    <hr>
    <form action="{{ action('FormationController@destroy', ['formation' => $formation->id_formation, $formation->vet])}}" class="form-group" method="post">
        @method('DELETE')
        @csrf
        <a href="{{ action('FormationController@edit', ['formation' => $formation->id_formation, $formation->vet]) }}" class="btn btn-success">Modifier</a>
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>

@endsection
