<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColocacionNotasController extends Controller
{
    //
    public function index()
    {
        $datos['colocacionnotass']  = DB::table('docentes')
        ->join('asignaciones', 'asignaciones.docentes_iddocente', '=', 'docentes.iddocente')
        ->join('detalle_asignaciones', 'detalle_asignaciones.asignaciones_idasignacion', '=', 'asignaciones.docentes_iddocente')
        ->join('cursos', 'cursos.idcurso', '=', 'detalle_asignaciones.cursos_idcurso')
        ->join('niveles', 'niveles.idniveles', '=', 'cursos.niveles_idniveles')
        ->join('detalle_matriculas', 'detalle_matriculas.cursos_idcurso', '=', 'cursos.idcurso')
        ->join('matriculas', 'matriculas.idmatricula', '=', 'detalle_matriculas.matriculas_idmatricula')
        ->join('estudiantes', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
            ->where('iddocente', 1)
            ->select('asignaciones.idasignacion','docentes.nombre AS nombreDocente', 'docentes.iddocente', 'cursos.*','detalle_matriculas.*', 
            'estudiantes.*', 'niveles.*', 'matriculas.*')
            ->get();

        dump($datos);
            
        return view('colocacionnotas.index', $datos);

    }

    function update(Request $request, $id)
    {



        $datosColocacion = request()->except('_token', '_method');
        
        $tamano = sizeof($datosColocacion)/6 ;

        for ($i=1; $i <= $tamano  ; $i++) { 
            # code...
            DB::table('detalle_matriculas')
            ->where('matriculas_idmatricula', $datosColocacion['idmatricula'.$i] )
            ->where('cursos_idcurso', $datosColocacion['idcurso'.$i] )
            ->update(['nota1' => $datosColocacion['nota1'.$i] ]);
        }
        
         


        
    }
}
