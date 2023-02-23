editar

<form action="{{ url('/curso/'.$datos->idcurso) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('curso.form');
</form>