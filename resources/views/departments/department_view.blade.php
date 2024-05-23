<div class="mx-14 mt-10 border-2 border-blue-400 rounded-lg">
    <div class="mt-10 text-center font-bold">Gestión de Departamento</div>
    <div class="mt-3 text-center text-4xl font-bold"></div>
    <div class="p-8">
        <form action="{{ route('departamentos.store') }}" method="POST">
            @csrf
            <div class="my-6 flex gap-4">
                <input type="text" name="nombre" class="block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Nombre del Departamento *" required />
                <input type="text" name="descripcion" class="block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Descripción del Departamento" />
            </div>
            <div class="text-center">
                <button type="submit" class="cursor-pointer rounded-lg bg-blue-700 px-8 py-5 text-sm font-semibold text-white">Registrar Departamento</button>
            </div>
        </form>
    </div>
</div>
