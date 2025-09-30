<?php

namespace App\Http\Controllers;

use App\Models\DetalleEstudiante;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DetalleEstudianteController extends Controller
{
    public function index()
    {
        $detalles = DetalleEstudiante::with('empleado.tipo_usuario')->get();
        return view('detalle_estudiante.index', compact('detalles'));
    }

    public function create()
    {
        $empleados = Empleado::whereHas('tipo_usuario', function ($query) {
            $query->where('nombre', 'Estudiante');
        })->whereDoesntHave('detalleEstudiante')->get();
        
        return view('detalle_estudiante.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nie' => 'required|string|unique:detalle_estudiante,nie',
            'empleado_id' => 'required|exists:empleado,codigo|unique:detalle_estudiante,empleado_id',
        ]);

        $data = $request->all();

        DetalleEstudiante::create($data);

        return redirect()->route('detalle_estudiante.index')->with('success', 'Detalle de estudiante creado exitosamente.');
    }

    public function show($id)
    {
        $detalle = DetalleEstudiante::with('empleado')->findOrFail($id);
        return view('detalle_estudiante.show', compact('detalle'));
    }

    public function edit($id)
    {
        $detalle = DetalleEstudiante::findOrFail($id);
        $empleados = Empleado::whereHas('tipo_usuario', function ($query) {
            $query->where('nombre', 'Estudiante');
        })->get();
        return view('detalle_estudiante.edit', compact('detalle', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nie' => 'required|string|unique:detalle_estudiante,nie,' . $id . ',codigo',
            'empleado_id' => 'required|exists:empleado,codigo|unique:detalle_estudiante,empleado_id,' . $id . ',codigo',
        ]);

        $detalle = DetalleEstudiante::findOrFail($id);
        $detalle->update($request->all());

        return redirect()->route('detalle_estudiante.index')->with('success', 'Detalle de estudiante actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $detalle = DetalleEstudiante::findOrFail($id);
        $detalle->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Detalle de estudiante eliminado exitosamente.']);
        }

        return redirect()->route('detalle_estudiante.index')->with('success', 'Detalle de estudiante eliminado exitosamente.');
    }
}
