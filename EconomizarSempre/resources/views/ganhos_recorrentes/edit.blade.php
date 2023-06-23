<!-- resources/views/ganhos_recorrentes/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Ganho Recorrente</h1>

    <form action="{{ route('ganhos_recorrentes.update', $ganho_recorrente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="users_id">Usuário:</label>
            <select name="users_id" id="users_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $ganho_recorrente->users_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" value="{{ $ganho_recorrente->valor }}">
        </div>

        <div class="form-group">
            <label for="frequencia">Frequência:</label>
            <select name="frequencia" id="frequencia" class="form-control">
                <option value="diaria" {{ $ganho_recorrente->frequencia == 'diaria' ? 'selected' : '' }}>Diária</option>
                <option value="semanal" {{ $ganho_recorrente->frequencia == 'semanal' ? 'selected' : '' }}>Semanal</option>
                <option value="mensal" {{ $ganho_recorrente->frequencia == 'mensal' ? 'selected' : '' }}>Mensal</option>
            </select>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control"
                value="{{ $ganho_recorrente->data_inicio }}">
        </div>

        <div class="form-group">
            <label for="data_termino">Data de Término:</label>
            <input type="date" name="data_termino" id="data_termino" class="form-control"
                value="{{ $ganho_recorrente->data_termino }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
