<!-- resources/views/ganhos/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Ganho</h1>

    <form action="{{ route('ganhos.update', $ganho) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="users_id">Usuário:</label>
            <select name="users_id" id="users_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $ganho->users_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" value="{{ $ganho->valor }}">
        </div>

        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" name="data" id="data" class="form-control" value="{{ $ganho->data }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
