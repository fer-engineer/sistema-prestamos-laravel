<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Tipos_usuario;
use App\Models\Estado;
use App\Models\DetalleDocente;
use App\Models\DetalleEstudiante;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with(['tipo_usuario', 'estado'])->get();
        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_usuario = Tipos_usuario::all();
        $estados = Estado::all();
        return view('empleado.create', compact('tipos_usuario', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:empleado,correo',
            'telefono' => 'required|string|max:15',
            'id_tipo_usuario' => 'required|exists:tipos_usuario,codigo',
            'id_estado' => 'required|exists:estados,codigo',
        ]);

        $data = $request->all();
        $data['fecha_creacion'] = now();
        $data['fecha_actualizacion'] = now();

        Empleado::create($data);

        return redirect()->route('empleado.index')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empleado = Empleado::with(['tipo_usuario', 'estado'])->findOrFail($id);
        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        $tipos_usuario = Tipos_usuario::all();
        $estados = Estado::all();
        return view('empleado.edit', compact('empleado', 'tipos_usuario', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:empleado,correo,' . $id . ',codigo',
            'telefono' => 'required|string|max:15',
            'id_tipo_usuario' => 'required|exists:tipos_usuario,codigo',
            'id_estado' => 'required|exists:estados,codigo',
        ]);

        $empleado = Empleado::findOrFail($id);
        $data = $request->all();
        $data['fecha_actualizacion'] = now();

        $empleado->update($data);

        return redirect()->route('empleado.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $empleado = Empleado::findOrFail($id);

        // Eliminar detalles relacionados
        if ($empleado->detalleDocente) {
            $empleado->detalleDocente->delete();
        }
        if ($empleado->detalleEstudiante) {
            $empleado->detalleEstudiante->delete();
        }

        // TODO: Considerar eliminar o desasociar encargados y préstamos si existen

        $empleado->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Empleado eliminado exitosamente.']);
        }

        return redirect()->route('empleado.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
