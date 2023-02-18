Crear grado

<form action="{{ url('/grado') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('grado.form');
</form>