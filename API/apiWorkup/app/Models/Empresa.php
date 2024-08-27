<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga; // Corrigido para usar a classe Vaga correta

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'tb_empresa';

    public $timestamps = false;

    protected $primaryKey = 'idEmpresa';

    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'idEmpresa');
    }
}