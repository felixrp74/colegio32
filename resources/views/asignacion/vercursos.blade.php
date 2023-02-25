<h1>Ver cursos de docentes</h1>
<table style="border: solid 1px;">
    <thead>
        <tr>
            <td style="border: solid 1px;"># Id Asignacion</td>
            <td style="border: solid 1px;">Nombre Docente</td>
            <td style="border: solid 1px;">id matricula</td>
            <td style="border: solid 1px;">id estudiante</td>
            <td style="border: solid 1px;">Nombre estudiante</td>
            <td style="border: solid 1px;">Id Curso </td>
            <td style="border: solid 1px;">Curso </td>
            <td style="border: solid 1px;">Especialidad </td>
            <td style="border: solid 1px;">Id Grado </td>
            <td style="border: solid 1px;">Grado </td>
            <td style="border: solid 1px;">Seccion </td>
            <td style="border: solid 1px;">Id cursos_idcursos </td>
            <td style="border: solid 1px;">Nota1 </td>
        </tr>
    </thead>
    <tbody>
        @foreach( $asignacioness as $asignacion )
        <tr>
            <td style="border: solid 1px;">{{ $asignacion->idasignacion }}</td>
            <td style="border: solid 1px;">{{ $asignacion->nombreDocente }}</td>
            <td style="border: solid 1px;">{{ $asignacion->idmatricula }}</td>
            <td style="border: solid 1px;">{{ $asignacion->idestudiante }}</td>
            <td style="border: solid 1px;">{{ $asignacion->nombre }}</td>
            <td style="border: solid 1px;">{{ $asignacion->idcurso }}</td>
            <td style="border: solid 1px;">{{ $asignacion->descripcion }}</td>
            <td style="border: solid 1px;">{{ $asignacion->especialidad }}</td>
            <td style="border: solid 1px;">{{ $asignacion->idniveles }}</td>
            <td style="border: solid 1px;">{{ $asignacion->grado }}</td>
            <td style="border: solid 1px;">{{ $asignacion->seccion }}</td>
            <td style="border: solid 1px;">{{ $asignacion->cursos_idcurso }}</td>
            <td style="border: solid 1px;">{{ $asignacion->nota1 }}</td>
        </tr>
        @endforeach
    </tbody>
    
</table>