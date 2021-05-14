@extends('app')
@section('title', 'Individus - Modifier')

@section('main')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form action="{{ action('IndividuController@update', $individu->id_individu) }}" method="POST">
                @csrf
                @method('PUT')

                <span class="font-weight-bold">{{"NUMERO INDIVIDU : "}}{{ $individu->id_individu }}</span>


                <div class="form-group">
                    <label class="@error('nom_individu') text-danger @enderror">Nom de l'individu</label>
                    <input type="text" class="form-control @error('nom_individu') is-invalid @enderror" name="nom_individu" placeholder="Nom de l'individu" value="{{ $individu->nom_individu }}">
                    @error('nom_individu')
                    <small class="form-text text-danger">Nom de l'individu invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('prenom_individu') text-danger @enderror">Prénom de l'individu</label>
                    <input type="text" class="form-control @error('prenom_individu') is-invalid @enderror" name="prenom_individu" placeholder="Prénom de l'individu" value="{{ $individu->prenom_individu }}">
                    @error('prenom_individu')
                    <small class="form-text text-danger">Prénom de l'individu invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('mail_individu') text-danger @enderror">Mail de l'individu</label>
                    <input type="text" class="form-control @error('mail_individu') is-invalid @enderror" name="mail_individu" placeholder="Mail de l'individu" value="{{ $individu->mail_individu }}">
                    @error('mail_individu')
                    <small class="form-text text-danger">Mail de l'individu invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('tel_individu') text-danger @enderror">Numéro de téléphone de l'individu</label>
                    <input type="text" class="form-control @error('tel_individu') is-invalid @enderror" name="tel_individu" placeholder="Téléphone de l'individu" value="{{ $individu->tel_individu }}">
                    @error('tel_individu')
                    <small class="form-text text-danger">Téléphone de l'individu invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('fid_type_individu') text-danger @enderror">Type individu</label>
                    <select id="select-type" class="selectpicker form-control" name="fid_type_individu" data-live-search="true" title="Sélectionner un type d'individu">
                        @foreach($typesIndividu as $tI)
                            <option value="{{ $tI->id_type_individu }}">
                                {{ $tI->libelle_type_individu }}
                            </option>
                        @endforeach
                    </select>
                    @error('fid_type_individu')
                    <small class="form-text text-danger">Ce type existe déjà pour cet individu</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="">Année d'inscription au type</label>
                    <input class="form-control" type="number" name="annee" value="{{date("Y")}}">
                    @error('annee')
                    <small class="form-text text-danger">Année invalide</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Modifier</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center mt-2">
        <div class="col-md-2">
            <form action="{{ action('IndividuController@destroy', [$individu->id_individu])}}" class="form-group" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
