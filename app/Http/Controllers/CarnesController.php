<?php

namespace App\Http\Controllers;

use App\Carnes;
use Illuminate\Http\Request;

class CarnesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carnes = Carnes::all();

        return view('carnes.index',[
            'carnes'    =>  $carnes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carne = new Carnes;

        return view('carnes.create',[
            'carne'    =>  $carne
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
        $carne = new Carnes;
        
        $request['valor_unitario'] = $this->parseCurrency($request->valor_unitario);

        $carne->fill($request->all());
        $carne->save();

        return redirect()->route('carnes.index')->with('flash.success','Carne adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carnes  $carnes
     * @return \Illuminate\Http\Response
     */
    public function show(Carnes $carnes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carnes  $carnes
     * @return \Illuminate\Http\Response
     */
    public function edit(Carnes $carnes,$id)
    {
        $carne = Carnes::find($id);

        return view('carnes.edit',[
            'carne'    =>  $carne
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carnes  $carnes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carnes $carnes,$id)
    {
        $carne = Carnes::find($id);
        $request['valor_unitario'] = $this->parseCurrency($request->valor_unitario);
        $carne->fill($request->all());
        $carne->save();

        return redirect()->route('carnes.index')->with('flash.success','Carne editada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carnes  $carnes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carnes $carnes,$id)
    {
        $carne = Carnes::find($id);
        $carne->delete();

        return redirect()->route('carnes.index')->with('flash.success','Carne excluída com sucesso.');

    }
}
