<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', function () {
    return view('dashboard');
});





// Vistas y Rutas de Marcas

Route::get('/marcas/show', function () { // Ruta de mi archivo show
    return view('marcas.show', // Ruta de Busqueda de Laravel
    ['marca' => 'Marca Electronica']);
});

Route::get('/marcas/create', function () { // Ruta de mi archivo create
    return view('marcas.create'); // Ruta de Busqueda de Laravel
});

Route::get('/marcas/update', function () { // Ruta de mi archivo update
    return view('marcas.update'); // Ruta de Busqueda de Laravel
});






