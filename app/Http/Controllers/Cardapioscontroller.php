<?php

namespace App\Http\Controllers;

use App\Cardapios;
use Illuminate\Http\Request;

class Cardapioscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardapios = Cardapios::all();

        return view('cardapios.index',[
            'cardapios' =>  $cardapios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cardapio = new Cardapios;

        return view('cardapios.create',[
            'cardapio' =>  $cardapio
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
        $cardapio = new Cardapios;

        $cardapio->fill($request->all());

        $cardapio->save();

        return redirect()->route('cardapios.index')->with('flash.success', 'Alimento criado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cardapios  $cardapios
     * @return \Illuminate\Http\Response
     */
    public function show(Cardapios $cardapios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cardapios  $cardapios
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardapios $cardapios,$id)
    {
        $cardapio = Cardapios::find($id);

        return view('cardapios.edit',[
            'cardapio' =>  $cardapio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cardapios  $cardapios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cardapios $cardapios,$id)
    {
        $cardapio = Cardapios::find($id);
        $cardapio->fill($request->all());
        $cardapio->save();

        return redirect()->route('cardapios.index')->with('flash.success', 'Alimento editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cardapios  $cardapios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardapios $cardapios)
    {
        //
    }
}
