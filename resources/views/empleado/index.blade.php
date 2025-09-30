@extends('layouts.app')

@section('title', 'Empleados')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-2xl font-semibold text-gray-800">Empleados</h2>
        <p class="text-sm text-gray-500">Listado de empleados registrados.</p>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('empleado.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Nuevo Empleado
        </a>
    </div>
</div>



<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Código</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Apellido</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Correo</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Teléfono</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tipo Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Fecha de creación</th>
                    <th class="px-6 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>

            <tbody class="bg-white">
                @forelse($empleados as $empleado)
                <tr class="bg-white hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $empleado->codigo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $empleado->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $empleado->apellido }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $empleado->correo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $empleado->telefono }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $empleado->tipo_usuario->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $empleado->estado->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $empleado->fecha_creacion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('empleado.show', ['empleado' => $empleado->codigo]) }}" class="inline-flex items-center px-3 py-1.5 mr-2 bg-blue-100 text-blue-800 border border-blue-200 rounded hover:bg-blue-200 text-sm">Ver</a>
                        <a href="{{ route('empleado.edit', ['empleado' => $empleado->codigo]) }}" class="inline-flex items-center px-3 py-1.5 mr-2 bg-green-100 text-green-800 border border-green-200 rounded hover:bg-green-200 text-sm">Modificar</a>
                        <form action="{{ route('empleado.destroy', ['empleado' => $empleado->codigo]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-800 border border-red-200 rounded hover:bg-red-200 text-sm btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-6 py-12 text-center text-gray-500">
                        No hay empleados registrados.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection