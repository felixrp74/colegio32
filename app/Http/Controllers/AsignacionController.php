<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\DetalleMatricula;
use App\Models\Curso;
use App\Models\Seccion;
use App\Models\Grado;
use App\Models\Nivele;
use App\Models\Asignacione;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    // docente: nombre y dni
    // grado: descripcion
    // seccion: descripcion

    public function index()
    {
        $datos['asignacioness']  = DB::table('docentes')
            ->join('asignaciones', 'docentes.iddocente', '=', 'asignaciones.docentes_iddocente')
            ->select('asignaciones.idasignacion','docentes.*')
            ->get();
            
        return view('asignacion.index', $datos);

    }

    public function create()
    {
        return view('asignacion.create');
    }

    public function store(Request $request)
    {     

        //  DATA QUE VIENE DESDE 'asignacion.index' 
        $datosForm = request()->except('_token');
        dump($datosForm);

        // HECHO. Consular la tabla 'niveles' where grado = 1 y seccion = C para extraer el valor de 'idniveles' "3".
        $nivel = Nivele::where('grado', $datosForm['Grado'])
            ->where('seccion', $datosForm['Seccion'])->first();
        dump($nivel->idniveles);

        $cursos = Curso::where('niveles_idniveles', '=', $nivel->idniveles)->where('descripcion', '=', $datosForm['Curso'])->first();
        dump($cursos->idcurso);
        
        
        DB::table('asignaciones')->insert(
            ['docentes_iddocente' => $datosForm['IdDocente']]
        );
        
                
        $asignacion = Asignacione::where('docentes_iddocente', $datosForm['IdDocente'])->first();
        dump($asignacion->idasignacion);
        dump($asignacion->docentes_iddocente);

        DB::table('detalle_asignaciones')->insert(
            [
                'asignaciones_idasignacion' => $asignacion->idasignacion, 'cursos_idcurso' => $cursos->idcurso
            ]
        );

        return redirect('/asignacion')->with('mensaje', 'Asignacion agregado con exito');
    }
 
    public function show($id)
    {
        //
        $datos['asignacioness']  = DB::table('docentes')
        ->join('asignaciones', 'asignaciones.docentes_iddocente', '=', 'docentes.iddocente')
        ->join('detalle_asignaciones', 'detalle_asignaciones.asignaciones_idasignacion', '=', 'asignaciones.docentes_iddocente')
        ->join('cursos', 'cursos.idcurso', '=', 'detalle_asignaciones.cursos_idcurso')
        ->join('niveles', 'niveles.idniveles', '=', 'cursos.niveles_idniveles')
        ->join('detalle_matriculas', 'detalle_matriculas.cursos_idcurso', '=', 'cursos.idcurso')
        ->join('matriculas', 'matriculas.idmatricula', '=', 'detalle_matriculas.matriculas_idmatricula')
        ->join('estudiantes', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
            ->where('iddocente', $id)
            ->select('asignaciones.idasignacion', 'docentes.nombre AS nombreDocente', 'estudiantes.*',
            'cursos.*', 'niveles.*', 'detalle_matriculas.*', 'matriculas.*')
            ->get();

        //dump($datos);
            
        return view('asignacion.vercursos', $datos);
    }
 
    public function edit($id)
    {
        //
        
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        

    }

}
