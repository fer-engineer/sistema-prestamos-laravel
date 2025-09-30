<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\Tipos_usuarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DetalleDocenteController;
use App\Http\Controllers\DetalleEstudianteController;
use App\Http\Controllers\EquipoController;


// Dashboard protegido
Route::get('/', function () {
    if (!session()->has('usuario')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');

// Formulario login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Cerrar sesión
Route::post('/logout', function () {
    session()->forget('usuario'); // borramos la sesión
    return redirect()->route('login'); // volvemos al login
})->name('logout'); 



// Procesar login
Route::post('/login', function (Request $request) {
    // Credenciales fijas
    $usuario = "admin";
    $password = "12345";

    if ($request->input('usuario') === $usuario && $request->input('password') === $password) {
        // Guardamos usuario en la sesión
        session(['usuario' => $usuario]);
        return redirect()->route('dashboard'); //  redirige al dashboard
    } else {
        //  enviamos error a session('error')
        return back()->with('error', 'Usuario o contraseña incorrectos');
    }
});

Route::resource('marcas', MarcaController::class);
Route::resource('estados', EstadoController::class);
Route::resource('tipos_usuario', Tipos_usuarioController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('detalle_docente', DetalleDocenteController::class);
Route::resource('detalle_estudiante', DetalleEstudianteController::class);
Route::resource('equipo', EquipoController::class);

