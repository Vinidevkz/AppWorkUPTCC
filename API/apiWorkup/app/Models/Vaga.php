<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\Models\AreaVaga;

class Vaga extends Model
{
    use HasFactory;

    protected $table = 'tb_vaga';

    public $timestamps = false;

    /*
|--------------------------------------------------------------------------
|Definindo relacionamento
|--------------------------------------------------------------------------
*/

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

/*
|--------------------------------------------------------------------------
|Definindo relacionamento
|--------------------------------------------------------------------------
*/

    public function areaVaga()
    {
        return $this->belongsTo(AreaVaga::class, 'idAreaVaga');
    }
}
