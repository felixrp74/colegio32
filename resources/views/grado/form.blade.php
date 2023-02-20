formulario 

<label for="Idestudiante">Id estudiante</label>
<input type="text" name="Idestudiante" value="{{ isset($grado->descripcion)?$grado->descripcion:'' }}" id="Descripcion">
<br>
<label for="Enviar">Enviar</label>
<input type="submit" value="Guardar datos">

<a href="{{ url('/grado') }}">Regresar</a>