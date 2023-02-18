<a href="{{ url('docente/create') }}">Registrar docente</a>

<table style="border: solid 1px;">
    <thead>
        <tr>
            <td style="border: solid 1px;">#</td>
            <td style="border: solid 1px;">Nombre</td>
            <td style="border: solid 1px;">Docente</td>
            <td style="border: solid 1px;">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach( $docentes as $docente )
        <tr>
            <td style="border: solid 1px;">{{ $docente->iddocente }}</td>
            <td style="border: solid 1px;">{{ $docente->nombre }}</td>
            <td style="border: solid 1px;">{{ $docente->profesion }}</td>
            <td style="border: solid 1px;">
                <a href="{{ url('/docente/'.$docente->iddocente.'/edit') }}">Editar</a>
                | 
                <form action="{{ url('/docente/'.$docente->iddocente) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>