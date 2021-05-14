@extends('app')
@section('title', 'Composantes - Ajouter')

@section('main')
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">

        </div>
        <!-- <h1> Exportation Excel </h1> -->
        <h2 class="mb-3">Export des données des étudiants</h2>
        <div class="card-body">
            <form action="{{ route('export') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="submit" value="Export" class="btn btn-success btn-block mb-2">
            </form>
        </div>
    </div>
      <br><br>
    <div class="card bg-light mt-3">
        <div class="card-header">

        </div>
        <!-- <h1> Exportation Excel </h1> -->
        <h2 class="mb-3">Export des données des groupes</h2>
        <div class="card-body">
            <form action="{{ route('exportGroupe') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <select class="form-control"  name="libelleGroupeChoix">
                  <option value="value" selected>Sélectionner un groupe</option>
                  @foreach($groupes as $groupe)
                    <option value="{{$groupe->libelle_groupe}}">{{ $groupe->libelle_groupe }}</option>
                  @endforeach
                </select>
                    <br>
                    <input type="submit" value="Export" class="btn btn-success btn-block mb-2">
            </form>
            <form action="{{ route('exportGroupeAll') }}" method="POST" enctype="multipart/form-data">
                @csrf
                </select>
                    <br>
                    <input type="submit" value="Exporter tous les groupes" class="btn btn-success btn-block mb-2">
            </form>
        </div>
    </div>
</div>
@endsection
