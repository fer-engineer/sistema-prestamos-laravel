<?php

namespace App\Http\Controllers;

use App\Models\Tipos_usuario;
use Illuminate\Http\Request;

class Tipos_usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_usuario = Tipos_usuario::all();
        return view('tipos_usuario.index', compact('tipos_usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos_usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:tipos_usuario|max:255',
            'descripcion' => 'required|string',
        ]);

        Tipos_usuario::create($request->all());

        return redirect()->route('tipos_usuario.index')
            ->with('success', 'Tipo de usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipos_usuario $tipos_usuario)
    {
        return view('tipos_usuario.show', compact('tipos_usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipos_usuario $tipos_usuario)
    {
        return view('tipos_usuario.edit', compact('tipos_usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipos_usuario $tipos_usuario)
    {
        $request->validate([
            'nombre' => 'required|unique:tipos_usuario,nombre,' . $tipos_usuario->codigo . ',codigo|max:255',
            'descripcion' => 'required|string',
        ]);

        $tipos_usuario->update($request->all());

        return redirect()->route('tipos_usuario.index')
            ->with('success', 'Tipo de usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Tipos_usuario $tipos_usuario)
    {
        $tipos_usuario->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Tipo de usuario eliminado correctamente.']);
        }

        return redirect()->route('tipos_usuario.index')
            ->with('success', 'Tipo de usuario eliminado correctamente.');
    }
}