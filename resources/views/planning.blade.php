@extends('app')

@section('title', 'Planning')

@section('head_links')
<link href="{{ url('fullcalendar/core/main.css' )}}" rel='stylesheet' />
<link href='{{ url("fullcalendar/daygrid/main.css") }}' rel='stylesheet' />
<link href='{{ url("fullcalendar/timegrid/main.css") }}' rel='stylesheet' />
<link href='{{ url("fullcalendar/list/main.css") }}' rel='stylesheet' />
<link href='{{ url("fullcalendar/bootstrap/main.css") }}' rel='stylesheet' />

<script src='{{ url("fullcalendar/core/main.js") }}'></script>
<script src='{{ url("fullcalendar/daygrid/main.js") }}'></script>
<script src='{{ url("fullcalendar/timegrid/main.js") }}'></script>
<script src='{{ url("fullcalendar/list/main.js") }}'></script>
<script src='{{ url("fullcalendar/bootstrap/main.js") }}'></script>

<script src="{{url('js/planning.js')}}">

</script>
@endsection

@section('main')

<div class="container">

    <div class="mt-3">
        <form  id="groupeForm" class="form-inline" action='{{ action("PlanningController@groupePlanningJSON") }}' method="post">
            @csrf
            <div class="form-inline">
                <label class="mr-2">Groupe :</label>
                <select id="groupePicker" class="selectpicker form-control" name="id_groupe" data-live-search="true" title="Sélectionner un groupe">
                    @foreach($groupes as $groupe)
                        <option value="{{ $groupe->id_groupe }}">
                            {{ $groupe->libelle_groupe }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <form  id="enseignantForm" class="form-inline" action='{{ action("PlanningController@enseignantPlanningJSON") }}' method="post">
            @csrf
            <div class="form-inline">
                <label class="mr-2">Individu :</label>
                <select id="enseignantPicker" class="selectpicker form-control" name="id_enseignant" data-live-search="true" title="Sélectionner un individu">
                    @foreach($enseignants as $enseignant)
                        <option value="{{ $enseignant->id_individu }}">
                            {{ $enseignant->prenom_individu }} {{ strtoupper($enseignant->nom_individu) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <hr>

    <div class="mt-3">
        <div id='calendar'></div>
    </div>
</div>
@endsection
