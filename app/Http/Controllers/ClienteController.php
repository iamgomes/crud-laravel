<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        $total = Cliente::all()->count();
        return view('list-clientes', compact('clientes','total'));
    }

    public function create() {
        return view('include-cliente');
    }

    public function store(Request $request) {
        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->nascimento = $request->nascimento;
        $cliente->save();
        return redirect()->route('cliente.index')->with('message', 'Cliente criado com sucesso!');
    }

    public function edit($id) {
        $cliente = Cliente::find($id);
        return view('alter-cliente', compact('cliente'));
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::find($id); 
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->nascimento = $request->nascimento;
        $cliente->save();
        return redirect()->route('cliente.index')->with('message', 'Cliente alterado com sucesso!');
    }

    public function destroy($id) {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('message', 'Cliente excluído com sucesso!');
    }
}
