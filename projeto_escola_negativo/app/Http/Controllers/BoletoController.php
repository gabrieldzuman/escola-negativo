<?php

namespace App\Http\Controllers;

use App\Models\Boleto;
use App\Models\User;
use Illuminate\Http\Request;

class BoletoController extends Controller
{
    public function index()
    {
        $boletos = Boleto::all();
        return view('boletos.index', compact('boletos'));
    }

    public function create()
    {
        $users = User::all();
        return view('boletos.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        Boleto::create($request->all());

        return redirect()->route('boletos.index')->with('success', 'Boleto criado com sucesso.');
    }

    public function show(Boleto $boleto)
    {
        return view('boletos.show', compact('boleto'));
    }

    public function edit(Boleto $boleto)
    {
        $users = User::all();
        return view('boletos.edit', compact('boleto', 'users'));
    }

    public function update(Request $request, Boleto $boleto)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        $boleto->update($request->all());

        return redirect()->route('boletos.index')->with('success', 'Boleto atualizado com sucesso.');
    }

    public function destroy(Boleto $boleto)
    {
        $boleto->delete();

        return redirect()->route('boletos.index')->with('success', 'Boleto deletado com sucesso.');
    }
}
