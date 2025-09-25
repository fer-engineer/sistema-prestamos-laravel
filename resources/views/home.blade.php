
{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inventario</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" databs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" arialabel="Toggle
navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <h1>Pantalla de inicio</h1>
    </div>
</body>

</html>
--}}


{{-- Heredamos la estructura del archivo app.blade.php--}}
@extends('layout.app')

{{-- Definimos el título de la página --}}
@section('title', 'Inicio')

{{-- Definimos el contenido de la página --}}
@section('content')
<h1>Pantalla de inicio</h1>
@endsection
