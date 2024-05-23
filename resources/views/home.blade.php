<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    @vite('resources/css/app.css')
    <style>
        /* Aquí puedes agregar tus estilos CSS si es necesario */
    </style>
</head> 
<body>
<header class="w-full bg-white dark:bg-gray-800 shadow">
    <nav class="container mx-auto px-6 py-3 md:flex md:justify-between md:items-center">
        <div class="flex justify-between items-center">
            <div>
                
            </div>
            <div class="md:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16v2H4zm0 6h16v2H4zm0 6h16v2H4z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="md:flex items-center">
            <div class="flex flex-col md:flex-row md:mx-6">
                <a class="my-1 text-sm text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0" >{{ auth()->user()->name }}</a>
                <a class="my-1 text-sm text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
           </div>
        </div>
    </nav>
</header>

<div class="flex h-screen bg-gray-100">
    <!-- sidebar -->
    <div class="hidden md:flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-white font-bold uppercase">GESTIEMP</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav class="flex-1 px-2 py-4 bg-gray-800">
                <a href="#" class="panel-link flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700" data-panel="dashboard">Panel Principal</a>
                <a href="#" class="panel-link flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700" data-panel="employee">Gestion de Empleados</a>
                <a href="#" class="panel-link flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700" data-panel="department">Gestion de Departamentos</a>
                <a href="#" class="panel-link flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700" data-panel="inform">Informes</a>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <div class="p-4" id="dashboard">
            @include('dash.dashboard')
        </div>
        <div class="p-4" id="employee" style="display: none;">
            @include('employees.employees_view', ['departamentos' => $departamentos])
        </div>
        
        <div class="p-4" id="department" style="display: none;">
            @include('departments.department_view')
        </div>

        <div class="p-4" id="inform" style="display: none;">
            @include('inform.inform_view')
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
    function loadContent(type) {

        var dashboard = document.getElementById('dashboard');
        var employee = document.getElementById('employee');
        var department = document.getElementById('department');
        var inform = document.getElementById('inform');

        dashboard.style.display = 'none';
        employee.style.display = 'none';
        department.style.display = 'none';
        inform.style.display = 'none';

        if (type === 'dashboard') {
            dashboard.style.display = 'block';
        } else if (type === 'employee') {
            employee.style.display = 'block';
        } else if (type === 'department') {
            department.style.display = 'block';
        }else if (type === 'inform') {
            inform.style.display = 'block';
        }
    }

    $(document).ready(function(){
        $('.panel-link').click(function(e){
            e.preventDefault();
            var panelId = $(this).data('panel');
            loadContent(panelId);
        });
    });
</script>
</body>
</html>
