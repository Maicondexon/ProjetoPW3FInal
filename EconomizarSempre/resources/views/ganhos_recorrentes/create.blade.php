<!-- resources/views/ganhos_recorrentes/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Adicionar Ganho Recorrente</h1>

    <form action="{{ route('ganhos_recorrentes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="users_id">Usuário:</label>
            <select name="users_id" id="users_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>

        <div class="form-group">
            <label for="frequencia">Frequência:</label>
            <select name="frequencia" id="frequencia" class="form-control">
                <option value="diaria">Diária</option>
                <option value="semanal">Semanal</option>
                <option value="mensal">Mensal</option>
            </select>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control">
        </div>

        <div class="form-group">
            <label for="data_termino">Data de Término:</label>
            <input type="date" name="data_termino" id="data_termino" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
