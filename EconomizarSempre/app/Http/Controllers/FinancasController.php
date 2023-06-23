<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ganhos;
use App\Models\Gastos;
use App\Models\GanhosRecorrentes;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//use Illuminate\Support\Facades\DB;


class FinancasController extends Controller
{

    // public function index()
    // {
    //     return view('financas.index');
    // }


    public function index()
    {
        $user = auth()->user();

        $ganhos = Ganhos::where('users_id', $user->id)->get();
        $ganhosRecorrentes = GanhosRecorrentes::where('users_id', $user->id)->get();
        $gastos = Gastos::where('users_id', $user->id)->get();

        $totalGanhos = $ganhos->sum('valor');
        $totalGanhosRecorrentes = $ganhosRecorrentes->sum('valor');
        $totalGastos = $gastos->sum('valor');

        $balanco = $totalGanhos + $totalGanhosRecorrentes - $totalGastos;

        return view('financas.index', [
            'ganhos' => $ganhos,
            'ganhosRecorrentes' => $ganhosRecorrentes,
            'gastos' => $gastos,
            'totalGanhos' => $totalGanhos,
            'totalGanhosRecorrentes' => $totalGanhosRecorrentes,
            'totalGastos' => $totalGastos,
            'balanco' => $balanco
        ]);
    }




    public function storeGanhos(Request $request)
    {
        // Lógica para salvar um novo ganho
        $ganho = new Ganhos();
        $ganho->users_id = auth()->user()->id;
        $ganho->valor = $request->input('valor');
        $ganho->data = $request->input('data');
        $ganho->save();

        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }

    public function storeGastos(Request $request)
    {
        // Lógica para salvar um novo gasto
        $gasto = new Gastos();
        $gasto->users_id = auth()->user()->id;
        $gasto->valor = $request->input('valor');
        $gasto->data = $request->input('data');
        $gasto->save();

        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }

    public function storeGanhosRecorrentes(Request $request)
    {
        // Lógica para salvar um novo ganho recorrente
        $ganhoRecorrente = new GanhosRecorrentes();
        $ganhoRecorrente->users_id = auth()->user()->id;
        $ganhoRecorrente->valor = $request->input('valor');
        $ganhoRecorrente->frequencia = $request->input('frequencia');
        $ganhoRecorrente->data_inicio = $request->input('data_inicio');
        $ganhoRecorrente->data_termino = $request->input('data_termino');
        $ganhoRecorrente->save();

        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }


    public function updateGanhos(Request $request, $id)
    {
        // Lógica para atualizar um ganho existente
        $ganho = Ganhos::findOrFail($id);
        $ganho->users_id = auth()->user()->id;
        $ganho->valor = $request->input('valor');
        $ganho->data = $request->input('data');
        $ganho->save();

        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }

    public function updateGastos(Request $request, $id)
    {
        // Lógica para atualizar um gasto existente
        $gasto = Gastos::findOrFail($id);
        $gasto->users_id = auth()->user()->id;
        $gasto->valor = $request->input('valor');
        $gasto->data = $request->input('data');
        $gasto->save();

        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }

    public function updateGanhosRecorrentes(Request $request, $id)
    {
        // Lógica para atualizar um ganho recorrente existente
        $ganhoRecorrente = GanhosRecorrentes::findOrFail($id);
        $ganhoRecorrente->users_id = auth()->user()->id;
        $ganhoRecorrente->valor = $request->input('valor');
        $ganhoRecorrente->frequencia = $request->input('frequencia');
        $ganhoRecorrente->data_inicio = $request->input('data_inicio');
        $ganhoRecorrente->data_termino = $request->input('data_termino');
        $ganhoRecorrente->save();

        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }


    public function destroyGanhos($id)
    {
        // Lógica para excluir um ganho existente
        $ganho = Ganhos::findOrFail($id);
        $ganho->delete();

        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }

    public function destroyGastos($id)
    {
        // Lógica para excluir um gasto existente
        $gasto = Gastos::findOrFail($id);
        $gasto->delete();



        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }

    public function destroyGanhosRecorrentes($id)
    {
        // Lógica para excluir um ganho recorrente existente
        $ganhoRecorrente = GanhosRecorrentes::findOrFail($id);
        $ganhoRecorrente->delete();

        // Redirecionar para a página financeira ou outra rota adequada
        return redirect()->route('financas');
    }
}
