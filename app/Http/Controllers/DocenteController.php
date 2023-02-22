<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

/**
 * Class DocenteController
 * @package App\Http\Controllers
 */
class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $docentes = Docente::paginate();

        return view('docente.index', compact('docentes'))
            ->with('i', (request()->input('page', 1) - 1) * $docentes->perPage());
        */
        $datos['docentes'] = Docente::paginate(15);
        return view('docente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        request()->validate(Docente::$rules);

        $docente = Docente::create($request->all());

        return redirect()->route('docentes.index')
            ->with('success', 'Docente created successfully.');

        */
        $datosDocente = request()->except('_token');

        /*if( $request->hasFile('Foto') ){
            $datosDocente['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        Docente::insert($datosDocente);
        return redirect('/docente')->with('mensaje', 'Docente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);

        return view('docente.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);

        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
        request()->validate(Docente::$rules);

        $docente->update($request->all());

        return redirect()->route('docentes.index')
            ->with('success', 'Docente updated successfully');
        */

        // estamos recibiendo todos los datos a exception de ...
        $datosDocente = request()->except('_token', '_method');

        /*if( $request->hasFile('Foto') ){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosDocente['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        Docente::where('iddocente','=',$id)->update($datosDocente);

        $docente = Docente::findOrFail($id);
        return view('docente.edit', compact('docente'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        /*
        $docente = Docente::find($id)->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Docente deleted successfully');

        */

        $docente = Docente::findOrFail($id);
        $docente::destroy($id);
        /*if(Storage::delete('public/'.$docente->Foto)){
            docente::destroy($id);
        }*/

        return redirect('/docente')->with('mensaje', 'docente borrado');
        //return redirect('/docente');
    }
}
