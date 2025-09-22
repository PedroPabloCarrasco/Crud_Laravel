<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Mostrar todos los productos con búsqueda, filtro y paginación
     */
    public function index(Request $request)
    {
        $query = Producto::query();

        // Filtro por búsqueda en nombre o descripción
        if ($request->filled('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%')
                ->orWhere('descripcion', 'like', '%' . $request->search . '%');
        }

        // Filtro por categoría
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        // Paginación de 6 productos por página
        $productos = $query->orderBy('nombre')->paginate(6)->withQueryString();

        return view('productos.index', compact('productos'));
    }

    /**
     * Mostrar formulario para crear un producto
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guardar producto nuevo
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string|in:Electrónica,Ropa,Alimentos,Otros',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    /**
     * Mostrar un producto específico
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Mostrar formulario para editar un producto
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualizar producto
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string|in:Electrónica,Ropa,Alimentos,Otros',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Eliminar producto
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
