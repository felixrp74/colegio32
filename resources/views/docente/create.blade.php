Formulario de cracion de estudiante

<form action="{{ url('/docente') }}" method="POST" enctype="multipart/form-data" >
@csrf

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre">
<br>

<label for="Profesion">Profesion</label>
<input type="text" name="Profesion" id="Profesion">
<br>

<input type="submit" value="Guardar datos">

</form>