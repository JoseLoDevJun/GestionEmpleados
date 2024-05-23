<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;

class PanelPrincipalController extends Controller
{
    public function index()
    {
        $empleadosCount = Empleado::count();
        $departamentosCount = Departamento::count();

        $departamentoMaxEmpleados = Departamento::withCount('empleados')->orderBy('empleados_count', 'desc')->first();
        $departamentoMinEmpleados = Departamento::withCount('empleados')->orderBy('empleados_count', 'asc')->first();

        return view('home', compact('empleadosCount', 'departamentosCount', 'departamentoMaxEmpleados', 'departamentoMinEmpleados'));
    }
}
