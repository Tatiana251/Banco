@extends('layouts.app')

@section('content')
<div class="container">
<div class="mt-5">
    <h1>Transferencias Bancarias</h1>
<form action="/transferir" method="POST">
    @csrf
    <div>
        <label for="cuentaPropia" class="font-weight-bold mb-1" id="cuentaPropia">
         Seleccione cuenta propia
         </label>
        <select name="origen_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option value="" selected>Cuentas Origen</option>
            @foreach ($cuentasOrigen as $cuenta)
                <option value="{{ $cuenta->id }}">{{ $cuenta->codigo }} - {{ $cuenta->descripcion }}</option>
            @endforeach
          </select>
    </div>
<div>
    <label for="cuentaDestino" class="font-weight-bold mb-1" id="cuentaDestino">
      Seleccione cuenta destino
     </label>
    <select name="destino_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option selected>Cuentas destino</option>
        @foreach ($CuentasDestino as $cuenta)
            <option value="{{ $cuenta->id }}">{{ $cuenta->codigo }} - {{ $cuenta->descripcion }}</option>
        @endforeach
      </select>
</div>
<div>

    <label for="valor" class="font-weight-bold mb-1" id="valor">
        Ingrese valor a depositar
     </label>
    <input type="text" name="valor" id="valor" class="form-control" placeholder="Monto a depositar">

</div>

<br>
    <button type="submit" class="btn btn-dark">Transferir</button>



</form>
</div>
</div>
@endsection
