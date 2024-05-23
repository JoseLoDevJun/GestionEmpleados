<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Departamento, Empleado};
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

}
