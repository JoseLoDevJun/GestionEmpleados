<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased dark:bg-white dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:white dark:text-white/50">
        <header class="w-full bg-white dark:bg-gray-800 shadow">
            <nav class="container mx-auto px-6 py-3 md:flex md:justify-between md:items-center">
                <div class="flex justify-between items-center">
                    <div>
                        <a class="text-gray-800 dark:text-white text-xl font-bold md:text-2xl hover:text-gray-700 dark:hover:text-gray-300" href="#">
                            GestiEmp
                        </a>
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
                        <a class="my-1 text-sm text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0" href="{{ route('login') }}">Iniciar Sesión</a>
                        <a class="my-1 text-sm text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0" href="{{ route('register') }}">Registrar</a>
                   </div>
                </div>
            </nav>
        </header>

        <div class="flex-grow flex flex-col md:flex-row items-center justify-center ">
            <div class="bg-blue w-11/12 md:w-1/2 h-auto md:h-[50vh] lg:h-[60vh] xl:h-[70vh] mt-8 flex flex-col items-center">
              <div class="inner_html">
                <h1 class="text-4xl md:text-4xl lg:text-8xl font-black text-gray-800  mt-5 md:mt-10 ml-5 md:ml-10" style="font-family: Fredoka, sans-serif;">Sistema de<br> Gestion <br> de Empleados</h1>
              </div>
            </div>
            <div class="bg-blue w-11/12 md:w-1/2 h-auto md:h-[50vh] lg:h-[60vh] xl:h-[70vh] mt-12 md:ml-10">
              <div class="inner_html">
                <img class="w-full h-auto md:h-[50vh]" src="/images/learn.jpg" alt="">
              </div>
            </div>
        </div>
    </div>
</body>
</html>
