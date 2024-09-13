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

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

    public function areaVaga()
    {
        return $this->belongsTo(AreaVaga::class, 'idAreaVaga');
    }
}
