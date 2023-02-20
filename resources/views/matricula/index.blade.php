<a href="{{ url('matricula/create') }}">Registrar matricula</a>

<table style="border: solid 1px;">
    <thead>
        <tr>
            <td style="border: solid 1px;"># Id Matricula</td>
            <td style="border: solid 1px;"># Id Estudiante</td>
            <td style="border: solid 1px;">Nombre </td>
        </tr>
    </thead>
    <tbody>
        @foreach( $matriculass as $matricula )
        <tr>
            <td style="border: solid 1px;">{{ $matricula->idmatricula }}</td>
            <td style="border: solid 1px;">{{ $matricula->idestudiante }}</td>
            <td style="border: solid 1px;">{{ $matricula->nombre }}</td>
            <td style="border: solid 1px;">
                <a href="{{ url('/matricula/'.$matricula->idmatricula.'/edit') }}">Editar</a>
                | 
                <form action="{{ url('/matricula/'.$matricula->idmatricula) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>