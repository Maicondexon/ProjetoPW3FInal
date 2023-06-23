<!-- resources/views/gastos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Gastos</h1>

    <a href="{{ route('gastos.create') }}" class="btn btn-primary mb-3">Adicionar Gasto</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gastos as $gasto)
                <tr>
                    <td>{{ $gasto->id }}</td>
                    <td>{{ $gasto->user->name }}</td>
                    <td>{{ $gasto->valor }}</td>
                    <td>{{ $gasto->data }}</td>
                    <td>
                        <a href="{{ route('gastos.edit', $gasto) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('gastos.destroy', $gasto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
