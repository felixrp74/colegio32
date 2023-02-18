<a href="{{ url('grado/create') }}">Registrar grado</a>

<table style="border: solid 1px;">
    <thead>
        <tr>
            <td style="border: solid 1px;">#</td>
            <td style="border: solid 1px;">Descripcion</td>
            <td style="border: solid 1px;">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach( $grados as $grado )
        <tr>
            <td style="border: solid 1px;">{{ $grado->idgrado }}</td>
            <td style="border: solid 1px;">{{ $grado->descripcion }}</td>
            <td style="border: solid 1px;">
                <a href="{{ url('/grado/'.$grado->idgrado.'/edit') }}">Editar</a>
                | 
                <form action="{{ url('/grado/'.$grado->idgrado) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>