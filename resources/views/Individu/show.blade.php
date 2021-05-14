{{json_encode($individu)}}

<br><br>

<form action="{{ action('IndividuController@destroy', ['individu' => $individu->id_individu])}}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-primary">Delete</button>
</form>
