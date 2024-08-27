<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa; // Corrigido para usar a classe Empresa correta

class Vaga extends Model
{
    use HasFactory;

    protected $table = 'tb_vaga';

    // Define a relação com o modelo Empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }
}