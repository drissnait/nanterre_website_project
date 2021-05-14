@extends('app')
@section('title', 'Individu - Créer')

@section('main')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form action="{{action('IndividuController@store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="@error('id_individu') text-danger @enderror">Numéro</label>
                    <input type="text" class="form-control @error('id_individu') is-invalid @enderror" name="id_individu" placeholder="Numéro individu">
                    @error('id_individu')
                    <small class="form-text text-danger">Numéro invalide ou déjà existant</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('arpeg') text-danger @enderror">ARPEG</label>
                    <input type="text" class="form-control @error('arpeg') is-invalid @enderror" name="arpeg" placeholder="Numéro ARPEG de l'individu">
                    @error('arpeg')
                    <small class="form-text text-danger">ARPEG invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('nom_individu') text-danger @enderror">Nom de l'individu</label>
                    <input type="text" class="form-control @error('nom_individu') is-invalid @enderror" name="nom_individu" placeholder="Nom de l'individu">
                    @error('nom_individu')
                    <small class="form-text text-danger">Nom invalide</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="@error('prenom_individu') text-danger @enderror">Prénom de l'individu</label>
                    <input type="text" class="form-control @error('prenom_individu') is-invalid @enderror" name="prenom_individu" placeholder="Prénom de l'individu">
                    @error('prenom_individu')
                    <small class="form-text text-danger">Prénom invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('mail_individu') text-danger @enderror">Mail de l'individu</label>
                    <input type="email" class="form-control @error('mail_individu') is-invalid @enderror" name="mail_individu" placeholder="example@example.com">
                    @error('mail_individu')
                    <small class="form-text text-danger">Mail invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('tel_individu') text-danger @enderror">Numéro de téléphone de l'individu</label>
                    <input type="text" class="form-control @error('tel_individu') is-invalid @enderror" name="tel_individu" placeholder="0000000000">
                    @error('tel_individu')
                    <small class="form-text text-danger">Numéro de téléphone invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('fid_type_individu') text-danger @enderror">Type de l'individu</label>
                    <select class="selectpicker form-control" name="fid_type_individu" data-live-search="true" title="Sélectionner un type d'individu">
                        @foreach($typesIndividu as $tI)
                            <option value="{{ $tI->id_type_individu }}">
                                {{ $tI->libelle_type_individu }}
                            </option>
                        @endforeach
                    </select>
                    @error('fid_type_individu')
                    <small class="form-text text-danger">Le type est invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="">Année d'inscription</label>
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
