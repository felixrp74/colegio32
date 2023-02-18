<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

/**
 * Class GradoController
 * @package App\Http\Controllers
 */
class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['grados'] = Grado::paginate(15);
        return view('grado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosGrado = request()->except('_token');

        Grado::insert($datosGrado);
        return redirect('/grado')->with('mensaje', 'Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grado = Grado::find($id);

        return view('grado.show', compact('grado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grado = Grado::findorFail($id); 
        return view('grado.edit', compact('grado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grado $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosGrado = request()->except('_token', '_method');
        Grado::where('idgrado','=',$id)->update($datosGrado);

        $grado = Grado::findOrFail($id);
        return view('grado.edit', compact('grado'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grado = Grado::findOrFail($id);
        $grado::destroy($id);

        return redirect('/grado')->with('mensaje', 'grado borrado');
    }
}
