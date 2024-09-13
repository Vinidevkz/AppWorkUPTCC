<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'tb_empresa';

    public $timestamps = false;

    protected $primaryKey = 'idEmpresa';

    public function vagasEmpresas()
    {
        return $this->hasMany(Vaga::class, 'idEmpresa');
    }
}
