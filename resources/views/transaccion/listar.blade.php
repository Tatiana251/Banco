@extends('layouts.app')
@section('content')
<section class="section container-fluid w-75">
    <div class="section-header">
        <h3 class="page__heading">Transacciones realizadas</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <table class="table table-striped table-hover">

                        <thead class="thead-light">

                            <th>Codigo</th>
                            <th>Banco Origen</th>
                            <th>Banco destino</th>
                            <th>N° cuenta destinatario</th>
                            <th>Valor</th>
                            <th>Fecha transacción</th>

                        </thead>

                        <tbody>
                            @foreach ($transacciones as $transaccion)
                            <tr>
                                <td><strong>{{$transaccion->codigo}}</strong></td>
                                <td>{{$transaccion->origen->descripcion}}</td>
                                <td>{{$transaccion->destino->descripcion }}</td>
                                <td>{{$transaccion->destino->codigo }}</td>
                                <td>${{ number_format($transaccion->valor, 0, ',', '.')}}</td>
                                <td>{{ $transaccion->created_at }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
