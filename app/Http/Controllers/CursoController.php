<?php

namespace App\Http\Controllers;

use App\Models\Curso; 
use App\Models\Nivele; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    //
    public function index()
    {   
        $datos['cursoss']  = DB::table('cursos')
            ->join('niveles', 'cursos.niveles_idniveles', '=', 'niveles.idniveles')
            ->select('cursos.*','niveles.*')
            ->get();           
            
        return view('curso.index', $datos);
    }

    public function create()
    {
        return view('curso.create');
    }

    public function store(Request $request)
    {
        $datosCurso = request()->except('_token');

        // insertar grado y seccion dentro de la tabla 'niveles'
        // insertar descripcion y especialidad dentro de la tabla 'cursos'.
         
        DB::table('niveles')->insert([
            'grado' => $datosCurso['Grado'],
            'seccion' => $datosCurso['Seccion']
        ]);

        $nivel = DB::table('niveles')
        ->where('grado', $datosCurso['Grado'])
        ->where('seccion', $datosCurso['Seccion'])->first();

        DB::table('cursos')->insert([
            'descripcion' => $datosCurso['Curso'],
            'especialidad' => $datosCurso['Especialidad'],
            'niveles_idniveles' => $nivel->idniveles
        ]);

        return redirect('/curso')->with('mensaje', 'Curso agregado con exito');
    }
}
