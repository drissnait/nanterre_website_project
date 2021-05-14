@extends('app')

@section('title', 'Salles')

@section('main')
<div class="container mb-5">
    <div class="row justify-content-md-center mt-3 mb-3">
        <div class="col-md-7">
            <h1 class="mb-3">Liste des salles</h1>
            <a href="{{ action('SalleController@create') }}" class="btn btn-primary btn-block">Ajouter une salle</a>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-7">
            <ul class="list-group">
                @foreach($salles as $salle)
                    <a class="list-group-item list-group-item-action">
                        <span class="font-weight-bold">{{ $salle->batiment }}  {{ $salle->numero_salle }} | Capacité = {{ $salle->capacite }} | Nbr Postes = {{ $salle->nb_postes }} | Nbr Projecteurs = {{ $salle->projecteur }} </span>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
