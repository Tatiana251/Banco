@extends('layouts.app')

@section('content')
    <center>
        <div class="container-sm">

            <div class="col-5">
                <div class="bg-success p-2 text-dark bg-opacity-10 row justify-content-center mt-3">
                    <h1 class="bg-success p-2 text-dark bg-opacity-50">Transferencia realizada con exito</h1>
                    <p class="h3 text-start">Codigo Transacción:{{ $transaccion->codigo }}</p>
                    <p class="h3 text-start">Banco origen:{{ $transaccion->origen->descripcion }}</p>
                    <p class="h3 text-start">Banco Destino: {{ $transaccion->destino->descripcion }}</p>
                    <p class="h3 text-start">Numero de cuenta destinatario: {{ $transaccion->destino->codigo }}</p>
                    <p class="h3 text-start">Valor de transferencia:
                        ${{ number_format($transaccion->valor, 0, ',', '.') }}</p>
                    <p class="h3 text-start">Fecha transacción: {{ $transaccion->created_at }}</p>
                </div>
            </div>
        </div>
    </center>
@endsection
