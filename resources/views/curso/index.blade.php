<a href="{{ url('curso/create') }}">Registrar curso</a>

<table style="border: solid 1px;">
    <thead>
        <tr>
            <td style="border: solid 1px;">#</td>
            <td style="border: solid 1px;">Nombre</td>
            <td style="border: solid 1px;">Especialidad</td>
            <td style="border: solid 1px;">Grado</td>
            <td style="border: solid 1px;">Seccion</td>
            <td style="border: solid 1px;">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach( $cursoss as $curso )
        <tr>
            <td style="border: solid 1px;">{{ $curso->idcurso }}</td>
            <td style="border: solid 1px;">{{ $curso->descripcion }}</td>
            <td style="border: solid 1px;">{{ $curso->especialidad }}</td>
            <td style="border: solid 1px;">{{ $curso->grado }}</td>
            <td style="border: solid 1px;">{{ $curso->seccion }}</td>
            <td style="border: solid 1px;">
                <a href="{{ url('/curso/'.$curso->idcurso.'/edit') }}">Editar</a>
                | 
                <form action="{{ url('/curso/'.$curso->idcurso) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>