<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::paginate(10);
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:departamentos',
            'descripcion' => 'nullable',
        ]);
    
        Departamento::create($request->all());
        return redirect()->back()->with('success', 'Departamento creado correctamente.');
    }
    

    public function show(Departamento $departamento)
    {
        return response()->json($departamento);
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required|unique:departamentos,nombre,' . $departamento->id,
            'descripcion' => 'nullable',
        ]);

        $departamento->update($request->all());
        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado correctamente.');
    }

    //Destroy = Eliminar departamento
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado correctamente.');
    }
}
