@extends('layout.dashboard')

@section('title', 'Crear Marca')

@section('content')
    <h2>Agregar una nueva Marca</h2>
    <form>
        <label for="nombre">Nombre de la marca:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ej: Sony">
        <br><br>
        <button type="submit">Guardar</button>
    </form>
@endsection
