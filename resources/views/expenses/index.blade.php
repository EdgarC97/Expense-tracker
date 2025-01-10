@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Lista de Gastos</h1>

    <div class="mb-3">
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">Nuevo Gasto</a>
    </div>

    <form action="{{ route('expenses.index') }}" method="GET" class="mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">Todas las categorías</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}"
                    placeholder="Fecha inicial">
            </div>
            <div class="col-md-3">
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}"
                    placeholder="Fecha final">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-secondary w-100">Filtrar</button>
            </div>
        </div>
    </form>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total de Gastos (página actual)</h5>
                    <p class="card-text fs-2 text-center">${{ number_format($totalCurrentPage, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total de Gastos (general)</h5>
                    <p class="card-text fs-2 text-center">${{ number_format($totalOverall, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th>Categoría</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr>
                        <td>{{ $expense->description }}</td>
                        <td>${{ number_format($expense->amount, 2) }}</td>
                        <td>{{ $expense->category->name }}</td>
                        <td>{{ $expense->date ? $expense->date->format('d/m/Y') : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('expenses.destroy', $expense) }}" method="POST"
                                class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $expenses->links() }}
    </div>

    <div class="row mb-4">
        @foreach ($totalByCategory as $index => $categoryTotal)
            <div class="col-md-4 mb-3">
                <div class="card bg-{{ $colors[$index % count($colors)] }} text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categoryTotal->name }}</h5>
                        <p class="card-text fs-4 text-center">${{ number_format($categoryTotal->total, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (confirm('¿Estás seguro de que quieres eliminar este gasto?')) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection
