
@extends('app')
@section('title')
Composantes - {{ $composante->libelle_composante }}
@endsection

@section('main')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1>Modifier la composante</h1>
            <hr class="mb-3">
            <form action="{{action('ComposanteController@update', ['composante' => $composante->id_composante])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="@error('libelle_composante') text-danger @enderror">Nom de la composante</label>
                    <input type="text" class="form-control @error('libelle_composante') is-invalid @enderror" name="libelle_composante" value={{$composante->libelle_composante}}>
                    @error('libelle_composante')
                    <small class="form-text text-danger">Nom de composante invalide : {{ $message}}</small>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center mt-2">
        <div class="col-md-2">
            <form action="{{ action('ComposanteController@destroy', ['composante' => $composante->id_composante])}}" class="form-group" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-5">
    <hr>
    <h3>Les formations de {{ $composante->libelle_composante }}</h3>
    <div class="col-md-3 mt-3">
        <ul class="list-group">
            @foreach($composante->formations as $formation)
                <a class="list-group-item list-group-item-action" href="{{ action('FormationController@edit', [$formation->fid_formation, $formation->vet]) }}">
                    @formationNomVersion([
                    'libelle' => "$formation->libelle_formation",
                    'styleLibelle' => "font-weight-bolder",
                    'vet' => "$formation->vet",
                    'styleVet' => "",
                    ])
                    @endformationNomVersion
                </a>
            @endforeach
        </ul>
    </div>

</div>
@endsection
