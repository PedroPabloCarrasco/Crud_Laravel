@extends('layouts.app')

@section('content')
    <h1 class="mb-4">{{ $producto->nombre }}</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> ${{ number_format($producto->precio, 0, '', '.') }}</p>
            <p><strong>Stock:</strong> {{ $producto->stock }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
        </div>
    </div>

    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
