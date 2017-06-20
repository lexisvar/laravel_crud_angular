<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cliente_id = null)
    {
        if($cliente_id == null){
            return Cliente::orderBy('cliente_id','asc')->get();
        }else{
            return $this->show($cliente_id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump($request->all());
        $cliente = new Cliente();
        $cliente->cliente_nombre = $request->input('cliente_nombre');
        $cliente->cliente_cedula = $request->input('cliente_cedula');
        $cliente->cliente_nit = $request->input('cliente_nit');
        $cliente->save();
        return 'El cliente fue creado éxitosamente con el id : '.$cliente->cliente_id;

    }

    public function show($cliente_id)
    {
        return Cliente::find($cliente_id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente_id)
    {

        $cliente = Cliente::find($cliente_id);

        $cliente->cliente_nombre = $request->input('cliente_nombre');
        $cliente->cliente_cedula = $request->input('cliente_cedula');
        $cliente->cliente_nit = $request->input('cliente_nit');
        $cliente->save();
        return 'El cliente fue actualizado correctamente con el id: '.$cliente->cliente_id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente_id)
    {
        $cliente = Cliente::find($cliente_id)->delete();
        return 'El cliente fue eliminado éxitosamente';
    }
}
