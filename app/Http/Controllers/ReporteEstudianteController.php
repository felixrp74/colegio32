<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\DetalleMatricula;
use App\Models\Curso;
use App\Models\Seccion;
use App\Models\Grado;
use App\Models\Nivele;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteEstudianteController extends Controller
{
    public function index()
    {
        $datos['reportenotas']  = DB::table('estudiantes')
        ->join('matriculas', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
        ->join('detalle_matriculas', 'matriculas.idmatricula', '=', 'detalle_matriculas.matriculas_idmatricula')
        ->join('cursos', 'cursos.idcurso', '=', 'detalle_matriculas.cursos_idcurso')
            ->select('matriculas.idmatricula','estudiantes.*','detalle_matriculas.*','cursos.*')
            ->where('estudiantes.idestudiante', '=', 1)
            ->get();
        
        //dump($datos);    
        return view('reporteestudiante.index', $datos);

    }

    public function create()
    {
        return view('matricula.create');
    }

    public function store(Request $request)
    {        
        
    }

    public function show($matriculaId)
    {
        
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

