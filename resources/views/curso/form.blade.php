

<label for="Curso">Curso</label>
<input type="text" name="Curso" id="Curso" value="{{ isset($datos->descripcion)?$datos->descripcion:'' }}" >
<br>

<label for="Especialidad">Especialidad</label>
<input type="text" name="Especialidad" id="Especialidad" value="{{ isset($datos->especialidad)?$datos->especialidad:'' }}" >
<br>

<label for="Grado">Grado</label>
<input type="text" name="Grado" id="Grado" value="{{ isset($datos->grado)?$datos->grado:'' }}" >
<br>

<label for="Seccion">Seccion</label>
<input type="text" name="Seccion" id="Seccion" value="{{ isset($datos->seccion)?$datos->seccion:'' }}" >
<br>

<input type="submit" value="Guardar datos">

<a href="{{ url('/curso') }}">Regresar</a>