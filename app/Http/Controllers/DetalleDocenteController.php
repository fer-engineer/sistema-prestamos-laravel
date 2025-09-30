<?php

namespace App\Http\Controllers;

use App\Models\DetalleDocente;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DetalleDocenteController extends Controller
{
    public function index()
    {
        $detalles = DetalleDocente::with('empleado.tipo_usuario')->get();
        return view('detalle_docente.index', compact('detalles'));
    }

    public function create()
    {
        // Obtener los empleados que son docentes y no tienen un detalle_docente asociado
        $empleados = Empleado::whereHas('tipo_usuario', function ($query) {
            $query->where('nombre', 'Docente');
        })->whereDoesntHave('detalleDocente')->get();
        
        return view('detalle_docente.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dui' => 'required|string|unique:detalle_docente,dui',
            'empleado_id' => 'required|exists:empleado,codigo|unique:detalle_docente,empleado_id',
        ]);

        $data = $request->all();

        DetalleDocente::create($data);

        return redirect()->route('detalle_docente.index')->with('success', 'Detalle de docente creado exitosamente.');
    }

    public function show($id)
    {
        $detalle = DetalleDocente::with('empleado')->findOrFail($id);
        return view('detalle_docente.show', compact('detalle'));
    }

    public function edit($id)
    {
        $detalle = DetalleDocente::findOrFail($id);
        $empleados = Empleado::whereHas('tipo_usuario', function ($query) {
            $query->where('nombre', 'Docente');
        })->get();
        return view('detalle_docente.edit', compact('detalle', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dui' => 'required|string|unique:detalle_docente,dui,' . $id . ',codigo',
            'empleado_id' => 'required|exists:empleado,codigo|unique:detalle_docente,empleado_id,' . $id . ',codigo',
        ]);

        $detalle = DetalleDocente::findOrFail($id);
        $detalle->update($request->all());

        return redirect()->route('detalle_docente.index')->with('success', 'Detalle de docente actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $detalle = DetalleDocente::findOrFail($id);
        $detalle->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Detalle de docente eliminado exitosamente.']);
        }

        return redirect()->route('detalle_docente.index')->with('success', 'Detalle de docente eliminado exitosamente.');
    }
}
