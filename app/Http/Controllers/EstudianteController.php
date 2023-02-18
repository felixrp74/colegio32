<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

/**
 * Class EstudianteController
 * @package App\Http\Controllers
 */

class EstudianteController extends Controller
{
    public function index()
    {
        $datos['estudiantes'] = Estudiante::paginate(15);
        return view('estudiante.index', $datos);
    }

    public function create()
    {
        return view('estudiante.create');
    }

    public function store(Request $request)
    {        
        $datosEstudiante = request()->except('_token');

        /*if( $request->hasFile('Foto') ){
            $datosEstudiante['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        Estudiante::insert($datosEstudiante);
        return redirect('/estudiante')->with('mensaje', 'Empleado agregado con exito');
    }
 
    public function show(Estudiante $estudiante)
    {
        //
    }
 
    public function edit($id)
    {
        //
        $estudiante = Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        // estamos recibiendo todos los datos a exception de ...
        $datosEstudiante = request()->except('_token', '_method');

        /*if( $request->hasFile('Foto') ){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEstudiante['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        Estudiante::where('idestudiante','=',$id)->update($datosEstudiante);

        $estudiante = Estudiante::findOrFail($id);
        return view('estudiante.edit', compact('estudiante'));
    }

    public function destroy($id)
    {
        //
        $estudiante = Estudiante::findOrFail($id);
        $estudiante::destroy($id);
        /*if(Storage::delete('public/'.$estudiante->Foto)){
            estudiante::destroy($id);
        }*/

        return redirect('/estudiante')->with('mensaje', 'estudiante borrado');
        //return redirect('/estudiante');

    }

}