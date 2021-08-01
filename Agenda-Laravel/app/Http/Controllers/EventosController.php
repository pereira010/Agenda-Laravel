<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventosRequest;
use App\Models\Eventos;
use App\Service\EventosService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EventosController extends Controller
{

    private $service;

    public function __construct(EventosService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencias = $this->service->listagemEventos();
        return view('eventos.index')->with('eventos', $dependencias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = $this->service->showForm();
        return view('eventos.cadastro')->with($response);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     ///REVER ABAIXO
    public function store(EventosRequest $request)
    {

        $data = $request->all();
        $response = $this->service->storage($data);
        if($response)
            return redirect('/eventos')->with('success', 'Evento Agendado Com Sucesso!');

        return redirect('/eventos/create')->with('error', 'Não Realizar Um Agendamento!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show(Eventos $eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit(Eventos $eventos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eventos $eventos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eventos $eventos, $id)
    {
        $response = $this->service->delete($id);
        return response()->json($response);
    }
}
