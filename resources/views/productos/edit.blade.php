@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Editar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('productos.update', $producto) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio:</label>
                    <input type="number" name="precio" class="form-control" min="0" step="1"
                        value="{{ old('precio', $producto->precio) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock:</label>
                    <input type="number" name="stock" class="form-control" min="0"
                        value="{{ old('stock', $producto->stock) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría:</label>
                    <input type="text" name="categoria" class="form-control"
                        value="{{ old('categoria', $producto->categoria) }}" required>
                </div>
                <button type="submit" class="btn btn-warning">Actualizar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
@endsection
