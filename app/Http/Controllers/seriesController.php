<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\serie;
use App\services\criadorSeries;
use App\services\removedorSerie;
use Illuminate\Http\Request;

class seriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $series = serie::query()->orderby('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeriesFormRequest $request, criadorSeries $criadorSeries)
    {
        $serie = $criadorSeries->criarserie($request->nome, $request->qtd_temporadas, $request->qtd_ep);
        $request->session()->flash('mensagem', "Serie {$serie->nome} foi adicionada com sucesso!");
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {   
        $newname = $request->nome;
        $serie = serie::find($id);
        $serie->nome = $newname;
        $serie->save();
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,removedorSerie $removedorSerie)
    {  
        $nome = $removedorSerie->removerserie($request->id);
        $request->session()->flash('mensagem', "A serie $nome foi removida com sucesso!");
        return redirect('/');
    }
}
