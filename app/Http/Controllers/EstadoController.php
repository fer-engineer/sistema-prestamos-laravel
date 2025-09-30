<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estado::all();
        return view('estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:estados|max:255',
            'descripcion' => 'required|string',
            'tipo_estado' => 'required|string|max:255',
        ]);

        Estado::create($request->all());

        return redirect()->route('estados.index')
            ->with('success', 'Estado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estado $estado)
    {
        return view('estados.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estado $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|string',
            'tipo_estado' => 'required|string|max:255',
        ]);

        $estado->update($request->all());

        return redirect()->route('estados.index')
            ->with('success', 'Estado updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Estado $estado)
    {
        try {
            $estado->delete();

            if ($request->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Estado eliminado correctamente.']);
            }

            return redirect()->route('estados.index')
                ->with('success', 'Estado eliminado correctamente.');
        } catch (QueryException $e) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'No se puede eliminar el estado porque está siendo utilizado.'], 422);
            }

            return redirect()->route('estados.index')
                ->with('error', 'No se puede eliminar el estado porque está siendo utilizado.');
        }
    }
}