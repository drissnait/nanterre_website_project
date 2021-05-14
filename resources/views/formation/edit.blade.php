@extends('app')
@section('title') Formation - {{ $formation->libelle_formation }} @endsection

@section('main')
<div class="container mt-2">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1>Modifier la formation</h1>
            <h3>
                @formationNomVersion([
                        'libelle' => "$formation->libelle_formation",
                        'vet' => "$formation->vet"
                    ])
                @endformationNomVersion
            </h3>
            <hr class="mb-3">
            <form action="{{action('FormationController@update', [$formation->id_formation, $formation->vet])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="@error('libelle_formation') text-danger @enderror">Nom de la formation</label>
                    <input type="text" class="form-control @error('libelle_formation') is-invalid @enderror" name="libelle_formation" value="{{$formation->libelle_formation}}">
                    @error('libelle_formation')
                    <small class="form-text text-danger">Nom de formation invalide : {{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="@error('libelle_formation') text-danger @enderror">Appartient à la composante</label>
                    <select id="selectpicker" class="selectpicker form-control" name="id_composantes[]" multiple data-live-search="true">
                        @foreach($composantes as $composante)
                            <option value="{{ $composante->id_composante }}">{{ $composante->libelle_composante }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input" type="checkbox"
                        name="new_version" id='new_version'
                        @if(!$isLatestVersion) disabled @endif
                    >
                    <label class="form-check-label" for="new_version">
                        Nouvelle version
                    </label>
                </div>
                @if(!$isLatestVersion)
                <span class="text-info">Une version plus récente existe déjà.</span>
                @endif
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center mt-2">
        <div class="col-md-2">
            <form action="{{ action('FormationController@destroy', [$formation->id_formation, $formation->vet])}}" class="form-group" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
            </form>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <hr>
    <h3>Toutes les versions de {{ $formation->libelle_formation }} :</h3>
    <div class="col-md-3 mt-3">
        <ul class="list-group">
            @foreach($formationAllVersion as $formationVersion)
                <a class="list-group-item list-group-item-action" href="{{ action('FormationController@edit', [$formationVersion->id_formation, $formationVersion->vet]) }}">
                    <!-- <span class="font-weight-bolder mr-2">{{ $formation->libelle_formation }}</span> -->
                    @formationNomVersion([
                    'libelle' => "$formationVersion->libelle_formation",
                    'styleLibelle' => "font-weight-bolder",
                    'vet' => "$formationVersion->vet",
                    'styleVet' => "",
                    ])
                    @endformationNomVersion
                </a>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        $('.selectpicker').selectpicker('val', [
            @foreach($formation->composantes as $composante)
                {{ $composante->fid_composante }},
            @endforeach
        ]);
    });
</script>
@endsection
