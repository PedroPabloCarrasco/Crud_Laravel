@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $producto->nombre }}</h1>

        <div class="card shadow-sm mb-4" style="border-top: 4px solid #0d6efd;">
            <div class="card-body">
                <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                <p><strong>Precio:</strong> ${{ number_format($producto->precio, 0, '', '.') }}</p>
                <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('productos.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i>
                Editar Producto</a>
        </div>
    </div>
@endsection
