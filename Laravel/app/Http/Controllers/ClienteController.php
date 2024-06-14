<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Vai exibir a rtabela com todos os clientes
        //Método get / hcamo o formul´parop
        $clientes = Cliente::all();
        return view("cliente.index", compact('clientes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar o formulário de cadastro de cliente
        // Método get 
        return view('cliente.create'); // nome da pasta.nome do arquivo que está em resources views
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Salva os dados na tabela Clientes
        // mértodo post
        Cliente::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
        ]);
        return "Registro inserido com sucesso!";

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Método Get
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Editar um registro de clientes. Mostrar formulário de edição
        // Método Get
        $cliente = Cliente::findOrFail($id); // Encontra (não precisa tyr cat) o cliente a partir do id e retorna todos os dados 
        return view("cliente.edit", compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Salvar alterações em um  registro
        // Método PUT
        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'nome' =>$request->input('nome'),
            'telefone' =>$request->input('telefone'),
            'email' =>$request->input('email'),

        ]);
        return "Registro alterado com sucesso!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Método DELETE
        //Excluir o registro
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return "Registro excluído com sucesso!";
    }

    public function delete(string $id)
    {
        //Método GET
        //Mostrar o formulário com os dados antes de excluir
        $cliente = Cliente::findOrFail($id); // Encontra (não precisa tyr cat) o cliente a partir do id e retorna todos os dados 
        return view("cliente.delete", compact('cliente'));
    }
}
