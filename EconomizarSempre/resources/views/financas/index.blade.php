<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Gestão Financeira</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="total-wrapper">
                {{ __('GESTÃO FINANCEIRA') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <p>Bem-vindo(a) {{ Auth::user()->name }}!</p>

                        <!-- Adicione o conteúdo específico de gestão financeira aqui -->

                        <div class="total-wrapper">
                            <div class="total-item">
                                <h2>Total de Ganhos:</h2>
                                <p>{{ $totalGanhos }}</p>
                            </div>
                            <div class="total-item">
                                <h2>Total de Ganhos Recorrentes:</h2>
                                <p>{{ $totalGanhosRecorrentes }}</p>
                            </div>
                            <div class="total-item">
                                <h2>Total de Gastos:</h2>
                                <p>{{ $totalGastos }}</p>
                            </div>
                            <div class="total-item">
                                <h2>Balanço:</h2>
                                <p>{{ $balanco }}</p>
                            </div>
                        </div>

                        <div class="container">
                            <!-- Formulário para adicionar um novo ganho -->
                            <div class="form-wrapper">
                                <h1 class="fs-sm">Adicionar Ganho</h1>
                                <form action="{{ route('Ganhos.store') }}" method="POST">
                                    @csrf
                                    <label>Valor do ganho:</label>
                                    <input type="number" name="valor" required><br>
                                    <label>Data do ganho:</label>
                                    <input type="date" name="data" required><br>
                                    <button class="btn-primary" type="submit">Adicionar Ganho</button>
                                </form>
                            </div>

                            <!-- Formulário para adicionar um novo gasto -->
                            <div class="form-wrapper">
                                <h1 class="fs-sm">Adicionar Gasto</h1>
                                <form action="{{ route('Gastos.store') }}" method="POST">
                                    @csrf
                                    <label>Valor do gasto:</label>
                                    <input type="number" name="valor" required><br>
                                    <label>Data do gasto:</label>
                                    <input type="date" name="data" required><br>
                                    <button class="btn-primary" type="submit">Adicionar Gasto</button>
                                </form>
                            </div>

                            <!-- Formulário para adicionar um novo ganho recorrente -->
                            <div class="form-wrapper">
                                <h1class="fs-sm">Adicionar Ganho Recorrente</h1>
                                    <form action="{{ route('GanhosRecorrentes.store') }}" method="POST">
                                        @csrf
                                        <label>Valor do ganho recorrente:</label>
                                        <input type="number" name="valor" required><br>
                                        <label>Frequência do ganho recorrente:</label>
                                        <select name="frequencia" required>
                                            <option value="Diária">Diária</option>
                                            <option value="Semanal">Semanal</option>
                                            <option value="Mensal">Mensal</option>
                                        </select><br>
                                        <label>Data de início do ganho recorrente:</label>
                                        <input type="date" name="data_inicio" required><br>
                                        <label>Data de término do ganho recorrente:</label>
                                        <input type="date" name="data_termino" required><br>
                                        <button class="btn-primary" type="submit">Adicionar Ganho Recorrente</button>
                                    </form>
                            </div>
                            <!-- Exibir lista de ganhos -->
                            <div class="list-wrapper">
                                <h1 class="fs-sm">Lista de Ganhos</h1>
                                <table>
                                    <tr>
                                        <th>Valor</th>
                                        <th>Data</th>
                                        <th>Ação</th>
                                    </tr>
                                    @foreach ($ganhos as $ganho)
                                        <tr>
                                            <td>{{ $ganho->valor }}</td>
                                            <td>{{ $ganho->data }}</td>
                                            <td>
                                                <form action="{{ route('Ganhos.destroy', $ganho->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="excluir" type="submit">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <!-- Exibir lista de gastos -->
                            <div class="list-wrapper">
                                <h1 class="fs-sm">Lista de Gastos</h1>
                                <table>
                                    <tr>
                                        <th>Valor</th>
                                        <th>Data</th>
                                        <th>Ação</th>
                                    </tr>
                                    @foreach ($gastos as $gasto)
                                        <tr>
                                            <td>{{ $gasto->valor }}</td>
                                            <td>{{ $gasto->data }}</td>
                                            <td>
                                                <form action="{{ route('Gastos.destroy', $gasto->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="excluir" type="submit">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <!-- Exibir lista de ganhos recorrentes -->
                            <div class="list-wrapper">
                                <h1 class="fs-sm">Lista de Ganhos Recorrentes</h1>
                                <table>
                                    <tr>
                                        <th>Valor</th>
                                        <th>Frequência</th>
                                        <th>Data de Início</th>
                                        <th>Data de Término</th>
                                        <th>Ação</th>
                                    </tr>
                                    @foreach ($ganhosRecorrentes as $ganhoRecorrente)
                                        <tr>
                                            <td>{{ $ganhoRecorrente->valor }}</td>
                                            <td>{{ $ganhoRecorrente->frequencia }}</td>
                                            <td>{{ $ganhoRecorrente->data_inicio }}</td>
                                            <td>{{ $ganhoRecorrente->data_termino }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('GanhosRecorrentes.destroy', $ganhoRecorrente->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="excluir" type="submit">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
