<?php

namespace App\Http\Controllers;

use App\Marmitex;
use Illuminate\Http\Request;

class MarmitexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marmitas = Marmitex::all();

        return view('marmitas.index',[
            'marmitas'=>$marmitas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marmitas = new Marmitex;

        return view('marmitas.create',[
            'marmitas'=>$marmitas
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
        $marmita = new Marmitex;

        $marmita->fill($request->all());

        $marmita->save();

        return redirect()->route('marmitas.index')->with('flash.success', 'Marmitex criado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marmitex  $marmitex
     * @return \Illuminate\Http\Response
     */
    public function show(Marmitex $marmitex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marmitex  $marmitex
     * @return \Illuminate\Http\Response
     */
    public function edit(Marmitex $marmitex,$id)
    {
        $marmitas = Marmitex::find($id);

        return view('marmitas.create',[
            'marmitas'=>$marmitas
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marmitex  $marmitex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marmitex $marmitex,$id)
    {
        $marmitas = Marmitex::find($id);

        $marmitas->fill($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marmitex  $marmitex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marmitex $marmitex)
    {
        //
    }
}
