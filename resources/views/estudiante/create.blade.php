Formulario de cracion de estudiante

<form action="{{ url('/estudiante') }}" method="POST" enctype="multipart/form-data" >
@csrf

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre">
<br>

<input type="submit" value="Guardar datos">

</form>