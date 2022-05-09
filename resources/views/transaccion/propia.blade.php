@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-5">
            <h1>Transferencias Bancarias a cuentas propias</h1>
            @if(isset($errorMessage))
                <h1 class="text-danger"> {{ $errorMessage }} </h1>
            @endif
            <form action="/transferir" method="POST">
                @csrf
                <div>
                    <label for="cuentaPropia" class="font-weight-bold mb-1" id="cuentaPropia">
                        Seleccione cuenta
                    </label>
                    <select name="origen_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="" selected>Primera cuenta propia</option>
                        @foreach ($cuentasOrigen as $cuenta)
                            <option value="{{ $cuenta->id }}">{{ $cuenta->codigo }} - {{ $cuenta->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="cuentaPropia" class="font-weight-bold mb-1" id="cuentaPropia">
                        Seleccione cuenta propia
                    </label>
                    <select name="origen_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="" selected>Cuentas Origen</option>
                        @foreach ($cuentasOrigen as $cuenta)
                            <option value="{{ $cuenta->id }}">{{ $cuenta->codigo }} - {{ $cuenta->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>


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
