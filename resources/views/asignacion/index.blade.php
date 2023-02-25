<a href="{{ url('asignacion/create') }}">Asignacion de cursos a docente</a>

<table style="border: solid 1px;">
    <thead>
        <tr>
            <td style="border: solid 1px;"># Id Asignacion</td>
            <td style="border: solid 1px;"># Id Docente</td>
            <td style="border: solid 1px;">Nombre </td>
            <td style="border: solid 1px;">Profesion </td>
            <td style="border: solid 1px;">Acciones </td>
            <td style="border: solid 1px;">Ver mas </td>
        </tr>
    </thead>
    <tbody>
        @foreach( $asignacioness as $asignacion )
        <tr>
            <td style="border: solid 1px;">{{ $asignacion->idasignacion }}</td>
            <td style="border: solid 1px;">{{ $asignacion->iddocente }}</td>
            <td style="border: solid 1px;">{{ $asignacion->nombre }}</td>
            <td style="border: solid 1px;">{{ $asignacion->profesion }}</td>
            <td style="border: solid 1px;">
                <a href="{{ url('/asignacion/'.$asignacion->idasignacion.'/edit') }}">Editar</a>
                | 
                <form action="{{ url('/asignacion/'.$asignacion->idasignacion) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                </form>

            </td>
            <td style="border: solid 1px;">
                <a href="{{ url('/asignacion/'.$asignacion->idasignacion) }}">Ver mas </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>