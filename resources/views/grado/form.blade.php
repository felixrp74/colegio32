formulario 

<label for="Descripcion">Descripcion</label>
<input type="text" name="Descripcion" value="{{ isset($grado->descripcion)?$grado->descripcion:'' }}" id="Descripcion">
<br>
<label for="Enviar">Enviar</label>
<input type="submit" value="Guardar datos">

<a href="{{ url('/grado') }}">Regresar</a>