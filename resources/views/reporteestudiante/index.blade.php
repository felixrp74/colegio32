<a href="{{ url('reporteestudiante/create') }}">Reporte Notas Estudiante</a>


<p><label for="Idestudiante">Id matricula: </label> {{ $reportenotas[0]->idmatricula }}</p>
<p><label for="Idestudiante">Id estudiante: </label> {{ $reportenotas[0]->idestudiante }}</p>
<p><label for="Idestudiante">Nombre y apellidos: </label> {{ $reportenotas[0]->nombre }}</p> 

<table style="border: solid 1px;">
    <thead>
        <tr>   
            <td style="border: solid 1px;"># </td>
            <td style="border: solid 1px;">Curso </td>
            <td style="border: solid 1px;">Especialidad </td>
            <td style="border: solid 1px;">Nota 1</td>
        </tr>
    </thead>
    <tbody>

        {{ $i = 1; }}

        @foreach( $reportenotas as $reporte )
        <tr>  
            <td style="border: solid 1px;">{{ $i++ }}</td>
            <td style="border: solid 1px;">{{ $reporte->descripcion }}</td>
            <td style="border: solid 1px;">{{ $reporte->especialidad }}</td>
            <td style="border: solid 1px;">{{ $reporte->nota1 }}</td> 
             
        </tr>
        @endforeach
    </tbody>
    
</table>


