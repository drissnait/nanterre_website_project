@extends('app')
@section('title', 'Salles - Modifier')

@section('main')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form  method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="@error('batiment') text-danger @enderror">Batiment</label>
                    <select id="select-batiment" class="selectpicker form-control" name="batiment" data-live-search="true" >
                        @foreach($salle as $sal)
                            <option value="{{ $sal->id_salle }}">
                                {{ $sal->batiment }}
                            </option>
                        @endforeach
                    </select>
                    @error('batiment')
                    <small class="form-text text-danger">Le batiment est invalide</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="@error('numero_salle') text-danger @enderror">Salle</label>
                    <select id="select-salle" class="selectpicker form-control" name="numero_salle" data-live-search="true" >
                        @foreach($salle as $sal)
                            <option value="{{ $sal->id_salle }}">
                                {{ $sal->numero_salle }}
                            </option>
                        @endforeach
                    </select>
                    @error('numero_salle')
                    <small class="form-text text-danger">Le numero de la salle est invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Capacité</label>
                    <input name="capacite" type="text" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Nombre de postes</label>
                    <input name="nb_postes" type="text" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Nombre de projecteurs</label>
                    <input name="projecteur" type="text" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Modifier</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center mt-2">
        <div class="col-md-2">
            <form class="form-group" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
