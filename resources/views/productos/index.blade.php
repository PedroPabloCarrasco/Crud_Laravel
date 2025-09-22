@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-success btn-lg">+ Nuevo Producto</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card card-producto shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p><strong>Precio:</strong> ${{ number_format($producto->precio, 0, '', '.') }}</p>
                        <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                        <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('productos.show', $producto) }}" class="btn btn-primary btn-sm">Ver</a>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
