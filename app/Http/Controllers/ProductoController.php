<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar formulario para crear un producto
    public function create()
    {
        return view('productos.create');
    }

    // Guardar producto nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    // Mostrar un producto específico
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    // Mostrar formulario para editar un producto
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar producto
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    // Eliminar producto
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
