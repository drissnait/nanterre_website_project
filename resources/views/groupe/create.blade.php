@extends('app')
@section('title', 'Groupe - Créer')

@section('main')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form action="{{action('GroupeController@store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="@error('libelle_groupe') text-danger @enderror">Nom du groupe</label>
                    <input type="text" class="form-control @error('libelle_groupe') is-invalid @enderror" name="libelle_groupe" placeholder="Nom du groupe">
                    @error('libelle_groupe')
                    <small class="form-text text-danger">Nom du groupe invalide</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="@error('fid_niveau') text-danger @enderror">Niveau du groupe</label>
                    <select class="selectpicker form-control" name="fid_niveau" data-live-search="true" title="Séléctionner un niveau">
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
                    <select class="selectpicker form-control" name="formation" data-live-search="true" title="Séléctionner une formation">
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
                    <select class="selectpicker form-control" name="fid_modalite" data-live-search="true" title="Séléctionner une modalité">
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
                    <input class="form-control" type="number" name="annee" value="{{date("Y")}}">
                    @error('annee')
                    <small class="form-text text-danger">Année invalide</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
