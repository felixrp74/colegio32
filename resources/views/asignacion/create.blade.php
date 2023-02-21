Formulario de cracion de detalle_matricula

<form action="{{ url('/asignacion') }}" method="POST" enctype="multipart/form-data" >
@csrf

<label for="IdDocente">Id Docente</label>
<input type="text" name="IdDocente" id="IdDocente" value="9">
<br>

<label for="Grado">Grado</label>
<input type="text" name="Grado" id="Grado" value="1">
<br>

<label for="Seccion">Seccion</label>
<input type="text" name="Seccion" id="Seccion" value="C">
<br>

<label for="Curso">Curso</label>
<input type="text" name="Curso" id="Curso" value="ARTE">
<br>

<input type="submit" value="Guardar datos">

</form>