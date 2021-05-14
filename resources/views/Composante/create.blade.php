@extends('app')
@section('title', 'Composantes - Ajouter')

@section('main')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form action="{{action('ComposanteController@store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="@error('libelle_composante') text-danger @enderror">Nom de la composante</label>
                    <input type="text" class="form-control @error('libelle_composante') is-invalid @enderror" name="libelle_composante" placeholder="SEGMI, STAPS...">
                    @error('libelle_composante')
                    <small class="form-text text-danger">Nom de composante invalide : {{ $message}}</small>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary btn-block">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
