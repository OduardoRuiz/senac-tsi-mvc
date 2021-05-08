<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class ClientesController extends Controller
{
    use HasFactory;
    use HasRoles;


    //Essa é uma forma de controlar o acesso
    public function __construct()
    {
        $this->middleware('permission:cliente-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:cliente-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:cliente-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cliente-delete', ['only' => ['destroy']]);
    }

    public function listar()
    {
        $clientes = Clientes::all();

        return view('clientes.listar', ['clientes' => $clientes]);
    }

    public function index(Request $request)
    {
        $qtd_por_pagina = 5;

        $data = Clientes::orderBy('id', 'DESC')->paginate($qtd_por_pagina);

        return view(
            'clientes.index',
            compact('data')
        )->with('i', ($request->input('page', 1) - 1) * $qtd_por_pagina);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required',
                'email' => 'required|email|unique:users,email'
            ]
        );

        $input = $request->all();

        Clientes::create($input);

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Clientes::find($id);

        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::find($id);

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required',
                'email' => 'required|email|unique:users,email'
            ]
        );

        $input = $request->all();

        $cliente = Clientes::find($id);

        $cliente->update($input);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::find($id)->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso');
    }
}
