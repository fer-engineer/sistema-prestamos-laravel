@extends('layouts.app')

@section('title', 'Crear Equipo')

@section('content')
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8 border-b border-gray-200">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Registrar Nuevo Equipo</h1>
            <p class="text-sm text-gray-500">Complete el formulario para agregar un nuevo equipo.</p>
        </div>
        <a href="{{ route('equipo.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 border border-gray-300 hover:border-gray-400 rounded-lg px-4 py-2 transition-all duration-200 flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Volver al listado
        </a>
    </div>

    <form action="{{ route('equipo.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Campo Marca -->
            <div class="space-y-2">
                <label for="id_marca" class="text-sm font-semibold text-gray-700">Marca</label>
                <select id="id_marca" name="id_marca" class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('id_marca') border-red-500 @enderror">
                    <option value="">Seleccione una marca</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->codigo }}" {{ old('id_marca') == $marca->codigo ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                @error('id_marca')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Modelo -->
            <div class="space-y-2">
                <label for="modelo" class="text-sm font-semibold text-gray-700">Modelo</label>
                <input type="text" id="modelo" name="modelo" class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('modelo') border-red-500 @enderror" placeholder="Ej: X1000" value="{{ old('modelo') }}">
                @error('modelo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Descripción -->
            <div class="space-y-2">
                <label for="descripcion" class="text-sm font-semibold text-gray-700">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3" class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('descripcion') border-red-500 @enderror" placeholder="Descripción del equipo">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Estado -->
            <div class="space-y-2">
                <label for="id_estado" class="text-sm font-semibold text-gray-700">Estado</label>
                <select id="id_estado" name="id_estado" class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('id_estado') border-red-500 @enderror">
                    <option value="">Seleccione un estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->codigo }}" {{ old('id_estado') == $estado->codigo ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                    @endforeach
                </select>
                @error('id_estado')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Fecha de Adquisición -->
            <div class="space-y-2">
                <label for="fecha_adquisicion" class="text-sm font-semibold text-gray-700">Fecha de Adquisición</label>
                <input type="date" id="fecha_adquisicion" name="fecha_adquisicion" class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('fecha_adquisicion') border-red-500 @enderror" value="{{ old('fecha_adquisicion') }}">
                @error('fecha_adquisicion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Botones de Acción -->
        <div class="border-t border-gray-200 pt-6 flex justify-end space-x-4">
            <a href="{{ route('equipo.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition-all duration-200">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Guardar Equipo
            </button>
        </div>
    </form>
</div>
@endsection
