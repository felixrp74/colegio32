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

        $nivel = DB::table('niveles')
        ->where('grado', $datosCurso['Grado'])
        ->where('seccion', $datosCurso['Seccion'])->first();

        dump($nivel);

        if(!(isset($nivel) && !empty($nivel)))
        {
            // cuando aun no existe el grado y seccion
            DB::table('niveles')->insert([
                'grado' => $datosCurso['Grado'],
                'seccion' => $datosCurso['Seccion']
            ]);

            $nivel = DB::table('niveles')
            ->where('grado', $datosCurso['Grado'])
            ->where('seccion', $datosCurso['Seccion'])->first();
        }
        
        DB::table('cursos')->insert([
            'descripcion' => $datosCurso['Curso'],
            'especialidad' => $datosCurso['Especialidad'],
            'niveles_idniveles' => $nivel->idniveles
        ]);

        return redirect('/curso')->with('mensaje', 'Curso agregado con exito');
    
    }

    public function edit($id)
    {   
        //$curso = Curso::findorFail($id);
        //$curso = DB::select('select * from cursos where idcurso = :id', ['id' => $id]);
        $datos  = DB::table('cursos')
            ->join('niveles', 'cursos.niveles_idniveles', '=', 'niveles.idniveles')
            ->where('cursos.idcurso', $id)
            ->select('cursos.*','niveles.*')
            ->get()->first();
        dump($datos);
        
        return view('curso.edit', compact('datos'));
        
    }

    public function update(Request $request, $id)
    {
        // estamos recibiendo todos los datos a exception de ...
        $datosCurso = request()->except('_token', '_method');

        // obtiene campos de cursos incluido 'niveles_idniveles'
        $curso = Curso::where('idcurso', $id)->first();
        //dump($curso->niveles_idniveles);


        Nivele::where('idniveles', $id)->update(['grado' => $datosCurso['Grado'], 
        'seccion' => $datosCurso['Seccion']]);

        Curso::where('idcurso', $id)->update(['descripcion' => $datosCurso['Curso'], 
        'especialidad' => $datosCurso['Especialidad']]);

        
        $datos  = DB::table('cursos')
            ->join('niveles', 'cursos.niveles_idniveles', '=', 'niveles.idniveles')
            ->where('cursos.idcurso', $id)
            ->select('cursos.*','niveles.*')
            ->get()->first();
        //dump($datos);
        
        return view('curso.edit', compact('datos'));
        
        
    }
}
