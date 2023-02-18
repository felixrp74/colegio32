editar

<form action="{{ url('/docente/'.$docente->iddocente) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('docente.form');
</form>