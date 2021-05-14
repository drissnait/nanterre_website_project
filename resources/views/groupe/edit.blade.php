@extends('app')
@section('title')
Groupe - {{$groupe->libelle_groupe}}
@endsection

@section('main')
<div class="container mt-2">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1>Modifier le groupe</h1>
            <h3>
                {{ $groupe->libelle_groupe }} 
            </h3>
            <hr class="mb-3">
            <form action="{{action('GroupeController@update', $groupe->id_groupe)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="@error('libelle_groupe') text-danger @enderror">Nom du groupe</label>
                    <input type="text" class="form-control @error('libelle_groupe') is-invalid @enderror" name="libelle_groupe" placeholder="Nom du groupe" value="{{ $groupe->libelle_groupe }}">
                    @error('libelle_groupe')
                    <small class="form-text text-danger">Nom du groupe invalide</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="@error('fid_niveau') text-danger @enderror">Niveau du groupe</label>
                    <select id="select-niveau" class="selectpicker form-control" name="fid_niveau" data-live-search="true" title="Séléctionner un niveau">
                        @foreach($niveaux as $niveau)
                            <option value="{{ $niveau->id_niveau }}">
                                {{ $niveau->libelle_niveau }}
                            </option>
                        @endforeach
                    </select>
                    @error('fid_niveau')
                    <small class="form-text text-danger">Niveau invalide</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="@error('formation') text-danger @enderror">Formation du groupe</label>
                    <select id="select-formation" class="selectpicker form-control" name="formation" data-live-search="true" title="Séléctionner une formation">
                        @foreach($formations as $formation)
                            <option value='{ "fid_formation" : "{{ $formation->id_formation }}", "f_vet" : "{{ $formation->vet }}" }'>
                                @formationNomVersion([
                                        'libelle' => "$formation->libelle_formation",
                                        'vet' => "$formation->vet",
                                    ])
                                @endformationNomVersion
                            </option>
                        @endforeach
                    </select>
                    @error('formation')
                    <small class="form-text text-danger">Formation invalide</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="@error('fid_modalite') text-danger @enderror">Modalité du groupe</label>
                    <select id="select-modalite" class="selectpicker form-control" name="fid_modalite" data-live-search="true" title="Séléctionner une modalité">
                        @foreach($modalites as $modalite)
                            <option value="{{ $modalite->id_modalite }}">
                                {{ $modalite->libelle_modalite }}
                            </option>
                        @endforeach
                    </select>
                    @error('fid_modalite')
                    <small class="form-text text-danger">Modalite invalide</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="">Année d'inscription du groupe</label>
                    <input class="form-control" type="number" name="annee" value="{{{ $groupe->annee }}}">
                    @error('annee')
                    <small class="form-text text-danger">Année invalide</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Modifier</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center mt-2">
        <div class="col-md-2">
            <form action="{{ action('GroupeController@destroy', [$groupe->id_groupe])}}" class="form-group" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
            </form>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <hr>
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <h3>Liste des étudiants de {{ $groupe->libelle_groupe }}</h3>
            <div class="mt-3">
                <ul class="list-group">
                    @foreach($groupeEtudiants as $etudiant)
                    <li class="list-group-item" href="{{ action('GroupeController@edit', [$groupe->id_groupe]) }}">
                        <form action="{{action('IndividuGroupeController@destroy', [$etudiant->id_individu, $groupe->id_groupe])}}" method="post">
                            <span class="font-weight-bold">{{ $etudiant->nom_individu }} {{ $etudiant->prenom_individu }} - {{ $etudiant->id_individu }}</span>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm float-right ml-2">Retirer</button>
                            <a class="btn btn-success btn-sm float-right" href="{{action('IndividuController@show', $etudiant->id_individu)}}">Profil</a>
                        </form>
                    </li>
                    @endforeach
                    <li class="list-group-item">
                        <span class="font-weight-bold">Total</span> <span class="float-right font-weight-bold mr-3">{{count($groupeEtudiants)}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-1">

        </div>
        <div class="col-md-5">
            <h3>Ajouter des étudiants</h3>
            <form class="mt-3" action="{{action('IndividuGroupeController@store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="fid_groupe" value="{{ $groupe->id_groupe }}">
                    <select id="select-etudiant" class="selectpicker form-control" name="id_individus[]" data-selected-text-format="count > 3" data-live-search="true" title="Séléctionner des étudiants" multiple>
                        @foreach($allEtudiants as $etudiant)
                            <option value="{{ $etudiant->id_individu }}" title="{{ $etudiant->nom_individu }} {{ $etudiant->prenom_individu }}" data-selected-text-format="count">
                                {{ $etudiant->nom_individu }} {{ $etudiant->prenom_individu }} - {{ $etudiant->id_individu }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Valider</button>
            </form>
        </div>
    </div>

</div>
@endsection

@section('js')
<script>
    $(function () {
        $('#select-niveau').selectpicker('val', [
            {{ $groupe->fid_niveau }}
        ]);

        $('#select-formation').selectpicker('val', [
            '{ "fid_formation" : "{{ $groupe->fid_formation }}", "f_vet" : "{{ $groupe->f_vet }}" }'
        ]);

        $('#select-modalite').selectpicker('val', [
            {{ $groupe->fid_modalite }}
        ]);

        $('#select-etudiant').selectpicker('val', [
            @foreach($groupeEtudiants as $etudiant)
                {{ $etudiant->id_individu }},
            @endforeach
        ]);
    });
</script>
@endsection
