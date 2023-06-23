<!-- resources/views/ganhos/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Ganhos</h1>

<a href="{{ route('ganhos.create') }}" class="btn btn-primary mb-3">Adicionar Ganho</a>

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
        @foreach($ganhos as $ganho)
        <tr>
            <td>{{ $ganho->id }}</td>
            <td>{{ $ganho->user->name }}</td>
            <td>{{ $ganho->valor }}</td>
            <td>{{ $ganho->data }}</td>
            <td>
                <a href="{{ route('ganhos.edit', $ganho) }}" class="btn btn-sm btn-primary">Editar</a>
                <form action="{{ roAanhos.destroy', $ganho) }}" method="POST" class="d-inline">
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