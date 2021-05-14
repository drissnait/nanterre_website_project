@extends('app')
@section('title', 'Salle - Créer')

@section('main')
<div class="container">
  <!-- @if(count($errors)>0)
      <ul>
          @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
          @endforeach
      </ul>
  @endif -->
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form action="{{action('SalleController@store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="@error('id_salle') text-danger @enderror">Batiment</label>
                    <input name="batiment" type="text" class="form-control" placeholder="Batiment">
                    <div class="help-block with-errors"></div>
                    @error('batiment')
                    <small class="form-text text-danger">Le batiment est invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('id_salle') text-danger @enderror">Numéro de la salle</label>
                    <input name="numero_salle" type="text" class="form-control" placeholder="numero salle" >
                    @error('numero_salle')
                    <small class="form-text text-danger">Numéro de salle invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('id_salle') text-danger @enderror">Capacité de la salle</label>
                    <input name="capacite" type="number" class="form-control" placeholder="capacité salle">
                    @error('capacite')
                    <small class="form-text text-danger">Capacité invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('id_salle') text-danger @enderror">Nombre de postes</label>
                    <input name="nb_postes" type="number" class="form-control" placeholder="nombre de postes">
                    @error('nb_postes')
                    <small class="form-text text-danger">Nombre de postes invalide</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error('id_salle') text-danger @enderror">Nombre de projecteurs</label>
                    <input name="projecteur" type="number" class="form-control" placeholder="nombre de projecteurs" >
                    @error('projecteur')
                    <small class="form-text text-danger">Nombre de projecteurs invalide</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
