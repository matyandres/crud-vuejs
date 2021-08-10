<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Persona;
use Illuminate\Http\Request;

class Person extends Controller
{

    public function index()
    {
        return \DB::table('personas')->get();
    }

    public function store(Request $request)
    {

        $request->validate([
            'rut'       => 'required',
            'nombre'    => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
        ]);
        $persona                   = new Persona();
        $persona->rut              = $request->rut;
        $persona->nombre           = $request->nombre;
        $persona->apellido_paterno = $request->apellidoP;
        $persona->apellido_materno = $request->apellidoM;
        $persona->save();
        return $persona;
    }

    public function update(Request $request, $id)
    {
        $persona                   = Persona::find($id);
        $persona->rut              = $request->rut;
        $persona->nombre           = $request->nombre;
        $persona->apellido_paterno = $request->apellidoP;
        $persona->apellido_materno = $request->apellidoM;
        $persona->save();
        return $persona;
    }

    public function destroy($id)
    {

        $persona = Persona::find($id);
        $persona->delete();
    }
}
