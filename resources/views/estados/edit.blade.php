@extends('layouts.app')

@section('title', 'Editar Estado')

@section('content')
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8 border-b border-gray-200">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Editar Estado</h1>
            <p class="text-sm text-gray-500">Actualice los datos del estado.</p>
        </div>
        <a href="{{ route('estados.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 border border-gray-300 hover:border-gray-400 rounded-lg px-4 py-2 transition-all duration-200 flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Volver al listado
        </a>
    </div>

    <form action="{{ route('estados.update', ['estado' => $estado->codigo]) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Campo Nombre -->
        <div class="space-y-2">
            <label for="nombre" class="text-sm font-semibold text-gray-700">Nombre del Estado</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /></svg>
                </div>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $estado->nombre) }}" class="block w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('nombre') border-red-500 @enderror" placeholder="Ej: Disponible, En reparación">
            </div>
            @error('nombre')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Descripción -->
        <div class="space-y-2">
            <label for="descripcion" class="text-sm font-semibold text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('descripcion') border-red-500 @enderror" placeholder="Información adicional sobre el estado...">{{ old('descripcion', $estado->descripcion) }}</textarea>
            @error('descripcion')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Tipo de Estado -->
        <div class="space-y-2">
            <label for="tipo_estado" class="text-sm font-semibold text-gray-700">Tipo de Estado</label>
            <select id="tipo_estado" name="tipo_estado" class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('tipo_estado') border-red-500 @enderror">
                <option value="Equipo" @if(old('tipo_estado', $estado->tipo_estado) == 'Equipo') selected @endif>Equipo</option>
                <option value="Usuario" @if(old('tipo_estado', $estado->tipo_estado) == 'Usuario') selected @endif>Usuario</option>
                <option value="Prestamo" @if(old('tipo_estado', $estado->tipo_estado) == 'Prestamo') selected @endif>Prestamo</option>
                <option value="General" @if(old('tipo_estado', $estado->tipo_estado) == 'General') selected @endif>General</option>
            </select>
            <p class="text-xs text-gray-500">Categoría a la que aplica el estado (ej. General, Equipo, Usuario).</p>
            @error('tipo_estado')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botones de Acción -->
        <div class="border-t border-gray-200 pt-6 flex justify-end space-x-4">
            <a href="{{ route('estados.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition-all duration-200">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0011.664 0l3.181-3.183m-4.991-2.691V5.006h-4.992v-.001M2.985 4.356v4.992m0 0h4.992m-4.993 0l3.181-3.183a8.25 8.25 0 0111.664 0l3.181 3.183" /></svg>
                Actualizar Estado
            </button>
        </div>
    </form>
</div>
@endsection
