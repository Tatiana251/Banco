<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Transaccion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Eloquent - ORM (Object Relational Maping) Query Builder
        $userId = Auth::user()->id;
        $viewData = [
            'cuentasOrigen' => Cuenta::where('user_id', '=', $userId)->get(),
            'CuentasDestino' => Cuenta::where('user_id', '<>', $userId)->get()
        ];
        return view('transaccion.index', $viewData);
    }

    public function listar()
    {
        $transacciones = Transaccion::paginate(50);
        return view('transaccion.listar', compact('transacciones'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        try {
            $transaccion = new Transaccion();
            $transaccion->origen_id = $input['origen_id'];
            $transaccion->destino_id = $input['destino_id'];
            $transaccion->valor = $input['valor'];

            if ($transaccion->save()) {
                $transaccion->descontar();
                return redirect()->route('transaccion.show', ['transaccion_id' => $transaccion->id]);
            }
        } catch (Exception $ex) {
            $viewData = [
                'cuentasOrigen' => Cuenta::where('user_id', '=', 1)->get(),
                'CuentasDestino' => Cuenta::where('user_id', '<>', 1)->get(),
                'errorMessage' => "Fallo al realizar transferencia, por favor intente de nuevo. " // . $ex->getMessage()
            ];
            return view('transaccion.index', $viewData);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $transaccion_id
     * @return \Illuminate\Http\Response
     */
    public function show(int $transaccion_id)
    {
        $transaccion = Transaccion::findOrFail($transaccion_id);
        $viewData = [
            'transaccion' => $transaccion,
        ];
        return view('transaccion.comprobante', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaccion $transaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaccion $transaccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaccion $transaccion)
    {
        //
    }
}
