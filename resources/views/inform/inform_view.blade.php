<div class="mx-14 mt-10 border-2 border-blue-400 rounded-lg">
    <div class="mt-10 text-center font-bold">Informe</div>
    <div class="mt-3 text-center text-4xl font-bold"></div>
    <div class="p-8">
        <div class="flex gap-16">
            <input id="searchInput" type="search" name="search" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Filtrar  por Empleado - Departamento*" />
        </div>
        <div class="my-6 flex gap-4">
            <!-- Puedes agregar más campos aquí si es necesario -->
        </div>
        <div class="flex gap-4">
            <!-- Columna izquierda: Lista de Empleados -->
            <div class="w-1/2">
                <div class="mb-4 text-center font-bold">Empleados</div>
                <table id="empleadosTable" class="w-full border-collapse border border-slate-300">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 px-4 py-2">Nombre</th>
                            <th class="border border-slate-300 px-4 py-2">Correo</th>
                            <th class="border border-slate-300 px-4 py-2">Acciones</th> <!-- Nuevo -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                        <tr>
                            <td class="border border-slate-300 px-4 py-2">{{ $empleado->nombre }} {{ $empleado->apellidos }}</td>
                            <td class="border border-slate-300 px-4 py-2">{{ $empleado->correo }}</td>
                            <td class="border border-slate-300 px-4 py-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700" data-toggle="modal" data-target="#empleadoModal" data-id="{{ $empleado->id }}">Ver</a> |
                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Columna derecha: Lista de Departamentos -->
            <div class="w-1/2">
                <div class="mb-4 text-center font-bold">Departamentos</div>
                <table id="departamentosTable" class="w-full border-collapse border border-slate-300">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 px-4 py-2">Nombre</th>
                            <th class="border border-slate-300 px-4 py-2">Acciones</th> <!-- Nuevo -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departamentos as $departamento)
                        <tr>
                            <td class="border border-slate-300 px-4 py-2">{{ $departamento->nombre }}</td>
                            <td class="border border-slate-300 px-4 py-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700" data-toggle="modal" data-target="#departamentoModal" data-id="{{ $departamento->id }}">Ver</a> |
                                <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            var $empleadosTable = $('#empleadosTable');
            var $departamentosTable = $('#departamentosTable');

            // Filtrar empleados
            $empleadosTable.find('tbody tr').each(function() {
                var empleadoNombre = $(this).find('td:eq(0)').text().toLowerCase();
                var empleadoCorreo = $(this).find('td:eq(1)').text().toLowerCase();

                if (empleadoNombre.includes(searchText) || empleadoCorreo.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Filtrar departamentos
            $departamentosTable.find('tbody tr').each(function() {
                var departamentoNombre = $(this).find('td:eq(0)').text().toLowerCase();

                if (departamentoNombre.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
