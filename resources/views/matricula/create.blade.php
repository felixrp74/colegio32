Formulario de cracion de detalle_matricula

<form action="{{ url('/matricula') }}" method="POST" enctype="multipart/form-data" >
@csrf

<label for="IdEstudiante">Id Estudiante</label>
<input type="text" name="IdEstudiante" id="IdEstudiante" value="17">
<br>

<label for="Grado">Grado</label>
<input type="text" name="Grado" id="Grado" value="1">
<br>

<label for="Seccion">Seccion</label>
<input type="text" name="Seccion" id="Seccion" value="C">
<br>

<label for="Especialidad">Especialidad</label>
<input type="text" name="Especialidad" id="Especialidad" value="AUTOMOTRIZ">
<br>

<input type="submit" value="Guardar datos">

</form>