Crear grado

<form action="{{ url('/grado/'.$grado->idgrado) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('grado.form');
</form>