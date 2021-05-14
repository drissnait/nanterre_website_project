@extends('app')
@section('title', 'formations - Ajouter')

@section('main')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form action="{{action('FormationController@store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="@error('libelle_formation') text-danger @enderror">Nom de la formation</label>
                    <input type="text" class="form-control @error('libelle_formation') is-invalid @enderror" name="libelle_formation" placeholder="Licence MIASHS, Licence MIAGE, Master MIAGE...">
                    @error('libelle_formation')
                    <small class="form-text text-danger">Nom de formation invalide : {{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="@error('libelle_formation') text-danger @enderror">Appartient à la composante</label>
                    <select class="selectpicker form-control" name="id_composantes[]" multiple data-live-search="true" title="Choisir une/des composante(s)">
                        @foreach($composantes as $composante)
                            <option value="{{ $composante->id_composante }}">
                                {{ $composante->libelle_composante }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
