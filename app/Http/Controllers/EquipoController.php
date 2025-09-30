<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Marca;
use App\Models\Estado;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::with(['marca', 'estado'])->get();
        return view('equipo.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();
        $estados = Estado::all();
        return view('equipo.create', compact('marcas', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_marca' => 'required|exists:marcas,codigo',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'id_estado' => 'required|exists:estados,codigo',
            'fecha_adquisicion' => 'required|date',
        ]);

        $data = $request->all();
        $data['fecha_creacion'] = now();
        $data['fecha_actualizacion'] = now();

        Equipo::create($data);

        return redirect()->route('equipo.index')->with('success', 'Equipo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipo = Equipo::with(['marca', 'estado'])->findOrFail($id);
        return view('equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        $marcas = Marca::all();
        $estados = Estado::all();
        return view('equipo.edit', compact('equipo', 'marcas', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_marca' => 'required|exists:marcas,codigo',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'id_estado' => 'required|exists:estados,codigo',
            'fecha_adquisicion' => 'required|date',
        ]);

        $equipo = Equipo::findOrFail($id);
        $data = $request->all();
        $data['fecha_actualizacion'] = now();

        $equipo->update($data);

        return redirect()->route('equipo.index')->with('success', 'Equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Equipo eliminado exitosamente.']);
        }

        return redirect()->route('equipo.index')->with('success', 'Equipo eliminado exitosamente.');
    }
}
