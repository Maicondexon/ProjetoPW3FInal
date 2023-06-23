<!-- resources/views/gastos/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Adicionar Gasto</h1>

    <form action="{{ route('gastos.store') }}" method="POST">
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
            <label for="data">Data:</label>
            <input type="date" name="data" id="data" class="
            form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
