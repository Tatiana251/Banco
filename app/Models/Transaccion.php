<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaccion extends Model
{
    protected $table = "transaccion";
    protected $fillable = ['origen_id', 'destino_id', 'valor'];

    public function origen() {
        return $this->belongsTo(Cuenta::class, 'origen_id');
    }

    public function destino() {
        return $this->belongsTo(Cuenta::class, 'destino_id');
    }


    public function descontar() {
        $this->origen->valor -= $this->valor;
        $this->origen->save();
        $this->destino->valor += $this->valor;
        $this->destino->save();
    }
}
