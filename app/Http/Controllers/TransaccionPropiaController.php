<?php

namespace App\Http\Controllers;

use App\Models\TransaccionPropia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuenta;
use Exception;


class TransaccionPropiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $viewData = [
            'cuentasOrigen' => Cuenta::where('user_id', '=', $userId)->get()
        ];
        return view('transaccion.propia', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        try {
            $transaccion = new TransaccionPropia();
            $transaccion->origen_id = $input['origen_id'];
            $transaccion->origen_id = $input['origen_id'];
            $transaccion->valor = $input['valor'];

            if ($transaccion->save()) {
                $transaccion->descontar();
                return redirect()->route('transaccion.show', ['transaccion_id' => $transaccion->id]);
            }
        } catch (Exception $ex) {
            $viewData = [
                'cuentasOrigen' => Cuenta::where('user_id', '=', 1)->get(),
                'cuentasOrigen' => Cuenta::where('user_id', '=', 1)->get(),
                'errorMessage' => "Fallo al realizar transferencia, por favor intente de nuevo. " // . $ex->getMessage()
            ];
            return view('transaccion.index', $viewData);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaccionPropia  $transaccionPropia
     * @return \Illuminate\Http\Response
     */
    public function show(int $transaccion_id )
    {
        //

        $transaccion = TransaccionPropia::findOrFail($transaccion_id);
        $viewData = [
            'transaccion' => $transaccion,
        ];
        return view('transaccion.comprobantePropio', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaccionPropia  $transaccionPropia
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaccionPropia $transaccionPropia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaccionPropia  $transaccionPropia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaccionPropia $transaccionPropia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaccionPropia  $transaccionPropia
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaccionPropia $transaccionPropia)
    {
        //
    }
}
