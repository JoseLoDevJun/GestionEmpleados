<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmpleadoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        $empleados = Empleado::all();
        $empleadosCount = Empleado::count();
        $departamentosCount = Departamento::count();

        $departamentoMaxEmpleados = Departamento::withCount('empleados')->orderBy('empleados_count', 'desc')->first();
        $departamentoMinEmpleados = Departamento::withCount('empleados')->orderBy('empleados_count', 'asc')->first();

        $empleadosPorGenero = DB::table('empleados')
            ->select(DB::raw('genero, COUNT(*) as count'))
            ->groupBy('genero')
            ->get();

        $edadPromedio = DB::table('empleados')
            ->select(DB::raw('AVG(TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())) as edad_promedio'))
            ->first();

        $empleadosPorPuesto = DB::table('empleados')
            ->select(DB::raw('puesto, COUNT(*) as count'))
            ->groupBy('puesto')
            ->get();

        return view('home', compact('departamentos', 'empleados', 'empleadosCount', 'departamentosCount', 'departamentoMaxEmpleados', 'departamentoMinEmpleados', 'empleadosPorGenero', 'edadPromedio', 'empleadosPorPuesto'));
    }
    
    

    public function create()
    {
        $departamentos = Departamento::all();
        return view('empleados.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email',
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|string',
            'puesto' => 'nullable|string',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);
    
        try {
            Empleado::create($request->all());
            return redirect()->route('empleados.index')->with('success', 'Empleado registrado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Ocurrió un error al registrar el empleado.'])->withInput();
        }
    }
    
    
    
    public function show(Empleado $empleado)
    {
        return response()->json($empleado);
    }



    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        $empleados = Empleado::all();
        return view('empleados.edit', compact('empleado', 'departamentos'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email|unique:empleados,correo,' . $empleado->id,
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|string',
            'puesto' => 'nullable|string',
            'departamento' => 'required|exists:departamentos,nombre', 
        ]);
    
        // Buscar el departamento por su nombre
        $departamento = Departamento::where('nombre', $request->input('departamento'))->first();
    
        // Actualizar los datos del empleado
        $empleado->update([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'genero' => $request->input('genero'),
            'puesto' => $request->input('puesto'),
        ]);
    
        // Asignar el departamento actualizado al empleado
        $empleado->departamento()->associate($departamento);
        $empleado->save();
    
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}

