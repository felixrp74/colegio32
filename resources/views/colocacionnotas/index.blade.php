<a href="{{ url('reporteestudiante/create') }}">Notas de los estudiantes</a>

<form action="{{ url('/colocacionnotas/'.$colocacionnotass[0]->idasignacion) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    
    <p><label for="Idestudiante">Id asignacion: </label> {{ $colocacionnotass[0]->idasignacion }}</p>
    <p><label for="Idestudiante">Id estudiante: </label> {{ $colocacionnotass[0]->nombreDocente }}</p> 



    <table style="border: solid 1px;">
        <thead>
            <tr>   
                <td style="border: solid 1px;"># </td>
                <td style="border: solid 1px;">NombreDocente </td>
                <td style="border: solid 1px;">Nombre </td>
                <td style="border: solid 1px;">Grado </td>
                <td style="border: solid 1px;">Seccion </td>
                <td style="border: solid 1px;">Curso </td>
                <td style="border: solid 1px;">Especialidad </td>
                <td style="border: solid 1px;">Nota 1</td>
            </tr>
        </thead>
        <tbody>

            {{ $i = 1; }}

            @foreach( $colocacionnotass as $colocacionnota )
            <tr>  
                <td style="border: solid 1px;">{{ $i }}</td>
                <td style="border: solid 1px;">{{ $colocacionnota->nombreDocente }}</td>
                <td style="border: solid 1px;">{{ $colocacionnota->nombre }}</td>
                <td style="border: solid 1px;">{{ $colocacionnota->grado }}</td>
                <td style="border: solid 1px;">{{ $colocacionnota->seccion }}</td>
                <td style="border: solid 1px;">{{ $colocacionnota->descripcion }}</td>
                <td style="border: solid 1px;">{{ $colocacionnota->especialidad }}</td>
                <td style="border: solid 1px;"><input type="number" name="{{ 'nota1'.$i }}" id="{{ 'nota1'.$i }}" value="{{ $colocacionnota->nota1 }}" max=20 min=0></td>
                <input type="hidden" id="{{ 'estudiante'.$i }}" name="{{ 'estudiante'.$i }}" value="{{$colocacionnota->idestudiante}}">
                <input type="hidden" id="{{ 'curso'.$i }}" name="{{ 'curso'.$i }}" value="{{$colocacionnota->idcurso}}">
                <input type="hidden" id="{{ 'nivel'.$i }}" name="{{ 'nivel'.$i }}" value="{{$colocacionnota->idniveles}}">
                <input type="hidden" id="{{ 'idmatricula'.$i }}" name="{{ 'idmatricula'.$i }}" value="{{$colocacionnota->idmatricula}}">
                <input type="hidden" id="{{ 'idcurso'.$i }}" name="{{ 'idcurso'.$i++ }}" value="{{$colocacionnota->idcurso}}">
                
            </tr>
            @endforeach
        </tbody>
        
    </table>
            
    <input type="submit" value="Guardar datos">
</form>
