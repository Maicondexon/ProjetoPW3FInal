<!-- resources/views/ganhos_recorrentes/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Ganhos Recorrentes</h1>

    <a href="{{ route('ganhos_recorrentes.create') }}" class="btn btn-primary mb-3">Adicionar Ganho Recorrente</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Valor</th>
                <th>Frequência</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ganhos_recorrentes as $ganho_recorrente)
                <tr>
                    <td>{{ $ganho_recorrente->id }}</td>
                    <td>{{ $ganho_recorrente->user->name }}</td>
                    <td>{{ $ganho_recorrente->valor }}</td>
                    <td>{{ $ganho_recorrente->frequencia }}</td>
                    <td>{{ $ganho_recorrente->data_inicio }}</td>
                    <td>{{ $ganho_recorrente->data_termino }}</td>
                    <td>
                        <a href="{{ route('ganhos_recorrentes.edit', $ganho_recorrente) }}"
                            class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('ganhos_recorrentes.destroy', $ganho_recorrente) }}" method="POST"
                            class="d-inline">
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
