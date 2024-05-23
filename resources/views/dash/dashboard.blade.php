<div class="mx-14 mt-10 border-2 border-blue-400 rounded-lg">
    <div class="mt-10 text-center font-bold">Panel Principal</div>
    <div class="mt-3 text-center text-4xl font-bold"></div>
    <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card: Empleados Registrados -->
            <div class="border-2 border-blue-400 rounded-lg p-6 text-center">
                <div class="text-2xl font-bold">Empleados Registrados</div>
                <div class="mt-4 text-4xl font-bold">{{ $empleadosCount }}</div>
            </div>
            <!-- Card: Departamentos Registrados -->
            <div class="border-2 border-blue-400 rounded-lg p-6 text-center">
                <div class="text-2xl font-bold">Departamentos Registrados</div>
                <div class="mt-4 text-4xl font-bold">{{ $departamentosCount }}</div>
            </div>
            <!-- Card: Departamento con Más Empleados -->
            <div class="border-2 border-blue-400 rounded-lg p-6 text-center">
                <div class="text-2xl font-bold">Departamento con Más Empleados</div>
                @if ($departamentoMaxEmpleados)
                    <div class="mt-4 text-4xl font-bold">{{ $departamentoMaxEmpleados->nombre }}</div>
                    <div class="text-lg">{{ $departamentoMaxEmpleados->empleados_count }} empleados</div>
                @else
                    <div class="mt-4 text-4xl font-bold">N/A</div>
                    <div class="text-lg">No hay datos disponibles</div>
                @endif
            </div>
            <!-- Card: Departamento con Menos Empleados -->
            <div class="border-2 border-blue-400 rounded-lg p-6 text-center">
                <div class="text-2xl font-bold">Departamento con Menos Empleados</div>
                @if ($departamentoMinEmpleados)
                    <div class="mt-4 text-4xl font-bold">{{ $departamentoMinEmpleados->nombre }}</div>
                    <div class="text-lg">{{ $departamentoMinEmpleados->empleados_count }} empleados</div>
                @else
                    <div class="mt-4 text-4xl font-bold">N/A</div>
                    <div class="text-lg">No hay datos disponibles</div>
                @endif
            </div>
            <!-- Card: Balance de Empleados por Género -->
            <div class="border-2 border-blue-400 rounded-lg p-6 text-center">
                <div class="text-2xl font-bold">Balance de Empleados por Género</div>
                <div class="mt-4 text-lg">
                    @foreach($empleadosPorGenero as $genero)
                        <div>{{ $genero->genero }}: {{ $genero->count }}</div>
                    @endforeach
                </div>
            </div>


            <!-- Card: Empleados por Puesto -->
            <div class="border-2 border-blue-400 rounded-lg p-6 text-center">
                <div class="text-2xl font-bold">Empleados por Puesto</div>
                <div class="mt-4 text-lg">
                    @foreach($empleadosPorPuesto as $puesto)
                        <div>{{ $puesto->puesto }}: {{ $puesto->count }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
