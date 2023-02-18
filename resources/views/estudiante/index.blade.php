<a href="{{ url('estudiante/create') }}">Registrar estudiante</a>

<table style="border: solid 1px;">
    <thead>
        <tr>
            <td style="border: solid 1px;">#</td>
            <td style="border: solid 1px;">Nombre</td>
            <td style="border: solid 1px;">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach( $estudiantes as $estudiante )
        <tr>
            <td style="border: solid 1px;">{{ $estudiante->idestudiante }}</td>
            <td style="border: solid 1px;">{{ $estudiante->nombre }}</td>
            <td style="border: solid 1px;">
                <a href="{{ url('/estudiante/'.$estudiante->idestudiante.'/edit') }}">Editar</a>
                | 
                <form action="{{ url('/estudiante/'.$estudiante->idestudiante) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>