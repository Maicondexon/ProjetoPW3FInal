<?php

namespace App\Http\Controllers;

use App\Models\Ganhos;
use Illuminate\Http\Request;

class GanhosController extends Controller
{
    public function index()
    {
        $ganhos = Ganhos::all();
        return view('ganhos.index', compact('ganhos'));
    }

    public function create()
    {
        return view('ganhos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'valor' => 'required',
            'data' => 'required',
        ]);

        Ganhos::create($request->all());

        return redirect()->route('ganhos.index')->with('success', 'Ganho adicionado com sucesso.');
    }

    public function edit(Ganhos $ganho)
    {
        return view('ganhos.edit', compact('ganho'));
    }

    public function update(Request $request, Ganhos $ganho)
    {
        $request->validate([
            'users_id' => 'required',
            'valor' => 'required',
            'data' => 'required',
        ]);

        $ganho->update($request->all());

        return redirect()->route('ganhos.index')->with('success', 'Ganho atualizado com sucesso.');
    }

    public function destroy(Ganhos $ganho)
    {
        $ganho->delete();

        return redirect()->route('ganhos.index')->with('success', 'Ganho excluído com sucesso.');
    }
};
