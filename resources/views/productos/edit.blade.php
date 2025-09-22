@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Producto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hay algunos errores en el formulario.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" min="0"
                    value="{{ old('precio', $producto->precio) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" min="0"
                    value="{{ old('stock', $producto->stock) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select name="categoria" class="form-select" required>
                    @foreach (['Electrónica', 'Ropa', 'Alimentos', 'Otros'] as $cat)
                        <option value="{{ $cat }}"
                            {{ old('categoria', $producto->categoria) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('productos.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>
                    Volver</a>
                <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Actualizar
                    Producto</button>
            </div>
        </form>
    </div>
@endsection
