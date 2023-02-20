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

class MatriculaController extends Controller
{
    // estudiante: nombre y dni
    // grado: descripcion
    // seccion: descripcion

    public function index()
    {
        $datos['matriculass']  = DB::table('estudiantes')
            ->join('matriculas', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
            ->select('matriculas.idmatricula','estudiantes.*')
            ->get();
            
        return view('matricula.index', $datos);

    }

    public function create()
    {
        return view('matricula.create');
    }

    public function store(Request $request)
    {        
        /*
            IdEstudiante 16
            Grado 1
            Seccion C
            Especialidad NULL
        */       

        $datosForm = request()->except('_token');
        //dump($datosForm);

        // HECHO. Consular la tabla 'niveles' where grado = 1 y seccion = C para extraer el valor de 'idniveles' "3".
        $nivel = Nivele::where('grado', $datosForm['Grado'])
            ->where('seccion', $datosForm['Seccion'])->first();
        //dump($nivel->idniveles);

        // Consultar la tabla 'cursos' where 'idniveles' "3" para extraer el array de cursos e insertarlo en 'detall_matricula'. 
        $cursos = DB::select('select * from cursos where niveles_idniveles = :id', ['id' => $nivel->idniveles]);
        //dump($cursos[0]->idcurso);
        
        
        DB::table('matriculas')->insert(
            ['estudiante_idestudiante' => $datosForm['IdEstudiante']]
        );
        
        
        
        $matricula = Matricula::where('estudiante_idestudiante', $datosForm['IdEstudiante'])->first();
        //dump($matricula->idmatricula);
        //dump($matricula->estudiante_idestudiante);

        foreach($cursos as $curso){
            DB::table('detalle_matriculas')->insert(
                [
                    'matriculas_idmatricula' => $matricula->idmatricula, 'cursos_idcurso' => $curso->idcurso
                ]
            );
        }
        
        return redirect('/matricula')->with('mensaje', 'Matricula agregado con exito');

    }
 
    public function show()
    {
        //
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
