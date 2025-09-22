@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle"></i> Nuevo Producto
        </a>
    </div>

    <!-- Filtro + búsqueda -->
    <form method="GET" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Buscar producto..."
                    value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="categoria" class="form-select">
                    <option value="">Todas las categorías</option>
                    @foreach (['Electrónica', 'Ropa', 'Alimentos', 'Otros'] as $cat)
                        <option value="{{ $cat }}" {{ request('categoria') == $cat ? 'selected' : '' }}>
                            {{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-funnel"></i> Filtrar
                </button>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($productos as $producto)
            @php
                $colors = [
                    'Electrónica' => '#0d6efd',
                    'Ropa' => '#198754',
                    'Alimentos' => '#ffc107',
                    'Otros' => '#6c757d',
                ];
                $color = $colors[$producto->categoria] ?? '#6c757d';

                // Color de stock
                $stockColor = $producto->stock < 5 ? 'danger' : ($producto->stock <= 20 ? 'warning' : 'success');
            @endphp
            <div class="col-md-4 mb-4">
                <div class="card card-producto shadow-sm" style="border-top: 4px solid {{ $color }};">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text text-truncate">{{ $producto->descripcion }}</p>
                        <p><strong>Precio:</strong> ${{ number_format($producto->precio, 0, '', '.') }}</p>
                        <p><strong>Stock:</strong> <span class="text-{{ $stockColor }}">{{ $producto->stock }}</span>
                        </p>
                        <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('productos.show', $producto) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No hay productos disponibles.</p>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $productos->links()
        </div>

        <!-- Estilos adicionales -->
        <style>
            .card-producto {
                transition: transform 0.2s, box-shadow 0.2s;
            }

            .card-producto:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            }
        </style>
@endsection
