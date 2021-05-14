@extends('app')
@section('title', 'Séances - Modifier')

@section('main')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form action="{{ action('SeanceController@update', $seance->id_seance) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="@error('fid_groupe') text-danger @enderror">Groupe</label>
                    <select id="select-groupe" class="selectpicker form-control" name="fid_groupe" data-live-search="true" title="Sélectionner un groupe">
                        @foreach($groupes as $groupe)
                            <option value="{{ $groupe->id_groupe }}">
                                {{ $groupe->libelle_groupe }}
                            </option>
                        @endforeach
                    </select>
                    @error('fid_groupe')
                    <small class="form-text text-danger">Le groupe est invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('fid_type_seance') text-danger @enderror">Type de la séance</label>
                    <select id="select-type-seance" class="selectpicker form-control" name="fid_type_seance" data-live-search="true" title="Sélectionner un type de séance">
                        @foreach($typeSeances as $typeSeance)
                            <option value="{{ $typeSeance->id_type_seance }}">
                                {{ $typeSeance->libelle_type_seance }}
                            </option>
                        @endforeach
                    </select>
                    @error('fid_type_seance')
                    <small class="form-text text-danger">Type de séance invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('fid_individu') text-danger @enderror">Enseignant</label>
                    <select id="select-individu" class="selectpicker form-control" name="fid_individu" data-live-search="true" title="Sélectionner un enseignant">
                        @foreach($enseignants as $enseignant)
                            <option value="{{ $enseignant->id_individu }}">
                                {{ $enseignant->prenom_individu }} {{ strtoupper($enseignant->nom_individu) }}
                            </option>
                        @endforeach
                    </select>
                    @error('fid_individu')
                    <small class="form-text text-danger">Enseignant invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('fid_salle') text-danger @enderror">Salle</label>
                    <select id="select-salle" name="fid_salle"  class="selectpicker form-control" data-live-search="true" title="Sélectionner une salle">
                        @foreach($salles as $salle)
                            <option value="{{ $salle->id_salle }}">
                                {{ $salle->batiment }} {{ $salle->numero_salle }} | cap : {{ $salle->capacite }}
                                @if($salle->projecteur == 1) | proj @endif
                            </option>
                        @endforeach
                    </select>
                    @error('fid_salle')
                    <small class="form-text text-danger">Salle invalide</small>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="@error('date_debut_seance') text-danger @enderror">Date de début</label>
                        <input name="date_debut_seance" type="datetime-local" class="form-control"
                        @if($seance->date_debut_seance != null)
                            value="{{ date('Y-m-d\TH:i', strtotime($seance->date_debut_seance)) }}"
                            @endif
                        >
                        @error('date_debut_seance')
                        <small class="form-text text-danger">Date invalide</small>
                        @enderror
                    </div>
                    <div class="col">
                        <label class="@error('date_fin_seance') text-danger @enderror">Date de fin</label>
                        <input name="date_fin_seance" type="datetime-local" class="form-control"
                            @if($seance->date_fin_seance != null)
                            value="{{ date('Y-m-d\TH:i', strtotime($seance->date_fin_seance)) }}"
                            @endif
                        >
                        @error('date_fin_seance')
                        <small class="form-text text-danger">Date invalide</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Modifier</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center mt-2">
        <div class="col-md-2">
            <form action="{{ action('SeanceController@destroy', [$seance->id_seance])}}" class="form-group" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        $('#select-groupe').selectpicker('val', [
            {{ $seance->fid_groupe }}
        ]);

        $('#select-type-seance').selectpicker('val', [
            {{ $seance->fid_type_seance }}
        ]);

        $('#select-individu').selectpicker('val', [
            {{ $seance->fid_individu }}
        ]);

        $('#select-salle').selectpicker('val', [
            {{ $seance->fid_salle }}
        ]);
    });
</script>
@endsection
