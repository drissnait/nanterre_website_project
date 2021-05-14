@extends('app')
@section('title', 'formations - import')

@section('main')
<h1>Importer des individus</h1>
<hr>
<h4>Le fichier doit respecter la forme : id | arpeg | nom | prenom | mail | tel | type_individu | année</h4>

<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Veuillez fournir un fichier excel (.xlsx)</label>
        <input type="file" name="file" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Importer</button>
</form>
<br><br>
<hr>
<h5>Il existe 4 types d'individus (Veillez à mettre un type parmi ceux affichés ci-dessous) :</h5>
<p style="text-indent:20px;"><i>*Etudiant/Etudiante.</i></p>
<p style="text-indent:20px;"><i>*Chargé de TD/Chargée de TD.</i></p>
<p style="text-indent:20px;"><i>*Maître de conférence.</i></p>
<p style="text-indent:20px;"><i>*Professeur/Professeure.</i></p>
@endsection
