<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Enderecos;
use DB;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();

        return view('clientes.index',[
            'clientes'=>$clientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Clientes;

        return view('clientes.create',[
            'cliente'=>$cliente
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cliente = new Clientes;
        $cliente->fill($request->all());

        $endereco = new Enderecos;
        $endereco->fill($request->all());


        DB::transaction(function() use ($cliente, $endereco) {
            $c = $cliente->save();
            $cliente->endereco()->save($endereco);
        });

        return redirect()->route('clientes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $cliente)
    {

        return view('clientes.edit',[
            'cliente'=>$cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $clientes,$id)
    {
        $cliente = Clientes::find($id);
        $cliente->fill($request->all());

        $endereco = new Enderecos;
        $endereco->fill($request->all());


        DB::transaction(function() use ($cliente, $endereco) {
            $cliente->save();
            $cliente->endereco()->update($endereco->attributesToArray());
        });

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes,$id)
    {
        $this->authorize('destroy', $clientes);

        $cliente = $clientes->find($id);
        $cliente->endereco()->delete();
        $cliente->delete();

        return redirect()->route('clientes.index')->with('flash.success', 'Cliente excluído com sucesso');
    }
}
