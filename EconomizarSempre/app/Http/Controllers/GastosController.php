<?php

namespace App\Http\Controllers;

use App\Models\Gastos;
use Illuminate\Http\Request;

class GastosController extends Controller
{
    public function index()
    {
        $gastos = Gastos::all();
        return view('gastos.index', compact('gastos'));
    }

    public function create()
    {
        return view('gastos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'valor' => 'required',
            'data' => 'required',
        ]);

        Gastos::create($request->all());

        return redirect()->route('gastos.index')->with('success', 'Gasto adicionado com sucesso.');
    }

    public function edit(Gastos $gasto)
    {
        return view('gastos.edit', compact('gasto'));
    }

    public function update(Request $request, Gastos $gasto)
    {
        $request->validate([
            'users_id' => 'required',
            'valor' => 'required',
            'data' => 'required',
        ]);

        $gasto->update($request->all());

        return redirect()->route('gastos.index')->with('success', 'Gasto atualizado com sucesso.');
    }

    public function destroy(Gastos $gasto)
    {
        $gasto->delete();

        return redirect()->route('gastos.index')->with('success', 'Gasto excluído com sucesso.');
    }
};
