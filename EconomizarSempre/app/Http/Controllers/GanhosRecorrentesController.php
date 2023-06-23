<?php

namespace App\Http\Controllers;

use App\Models\GanhosRecorrentes;
use Illuminate\Http\Request;

class GanhosRecorrentesController extends Controller
{
    public function index()
    {
        $ganhosRecorrentes = GanhosRecorrentes::all();
        return view('ganhos_recorrentes.index', compact('ganhosRecorrentes'));
    }

    public function create()
    {
        return view('ganhos_recorrentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'valor' => 'required',
            'frequencia' => 'required',
            'data_inicio' => 'required',
        ]);

        GanhosRecorrentes::create($request->all());

        return redirect()->route('ganhos_recorrentes.index')->with('success', 'Ganho recorrente adicionado com sucesso.');
    }

    public function edit(GanhosRecorrentes $ganhoRecorrente)
    {
        return view('ganhos_recorrentes.edit', compact('ganhoRecorrente'));
    }

    public function update(Request $request, GanhosRecorrentes $ganhoRecorrente)
    {
        $request->validate([
            'users_id' => 'required',
            'valor' => 'required',
            'frequencia' => 'required',
            'data_inicio' => 'required',
        ]);

        $ganhoRecorrente->update($request->all());

        return redirect()->route('ganhos_recorrentes.index')->with('success', 'Ganho recorrente atualizado com sucesso.');
    }

    public function destroy(GanhosRecorrentes $ganhoRecorrente)
    {
        $ganhoRecorrente->delete();

        return redirect()->route('ganhos_recorrentes.index')->with('success', 'Ganho recorrente excluído com sucesso.');
    }
};
