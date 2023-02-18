editar

<form action="{{ url('/estudiante/'.$estudiante->idestudiante) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('estudiante.form');
</form>