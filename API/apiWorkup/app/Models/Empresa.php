<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'tb_empresa';

    public $timestamps = false;

    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'idEmpresa');
    }
}
