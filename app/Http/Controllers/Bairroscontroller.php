<?php

namespace App\Http\Controllers;

use App\Bairros;
use Illuminate\Http\Request;

class Bairroscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bairros = Bairros::all();
        return view('bairros.index',[
            'bairros'   =>  $bairros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bairro = new Bairros;
        return view('bairros.create',[
            'bairro'=>$bairro
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
        $bairro = new Bairros;

        $bairro->fill($request->all());

        $bairro->save();

        return redirect()->route('bairros.index')->with('flash.success', 'Bairro criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bairros  $bairros
     * @return \Illuminate\Http\Response
     */
    public function show(Bairros $bairros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bairros  $bairros
     * @return \Illuminate\Http\Response
     */
    public function edit(Bairros $bairros,$id)
    {
        $bairro = $bairros::find($id);

        return view('bairros.edit',[
            'bairro'=>$bairro
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bairros  $bairros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bairros $bairros,$id)
    {
        $bairro = $bairros->find($id);

        $bairro->fill($request->all());

        $bairro->save();

        return redirect()->route('bairros.index')->with('flash.success', 'Bairro editado com sucesso');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bairros  $bairros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bairros $bairros,$id)
    {
        $bairros->find($id)->delete();

        return redirect()->route('bairros.index')->with('flash.success', 'Bairro deletado com sucesso');;

    }
}
