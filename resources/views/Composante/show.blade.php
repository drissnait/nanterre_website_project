@extends('app')
@section('title', 'Composante - ' . $composante->libelle_composante)

@section('main')
<div class="container">
    <h1>{{ $composante->libelle_composante }}</h1>
    <hr>
    <form action="{{ action('ComposanteController@destroy', ['composante' => $composante->id_composante])}}" class="form-group" method="post">
        @method('DELETE')
        @csrf
        <a href="{{ action('ComposanteController@edit', ['composante' => $composante->id_composante]) }}" class="btn btn-success">Modifier</a>
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>

@endsection
