<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga;

class Area extends Model
{
    use HasFactory;

    protected $table = 'tb_area';

    public $timestamps = false;

    protected $fillable = [
        'nomeArea',
    ];

/*
|--------------------------------------------------------------------------
|Definindo chave primaria
|--------------------------------------------------------------------------
*/
    protected $primaryKey = 'idArea';
/*
|--------------------------------------------------------------------------
|Definindo relacionamento
|--------------------------------------------------------------------------
*/
    public function vagasPorArea()
    {
        return $this->hasMany(Vaga::class, 'idArea');
    }

    public function empresas()
{
    return $this->belongsToMany(Empresa::class, 'tb_AtuacaoEmpresa', 'idArea', 'idEmpresa');
}

public function usuarios()
{
    return $this->belongsToMany(Usuario::class, 'tb_AreaInteresseUsuario', 'idArea', 'idUsuario');
}

public function vagas()
{
    return $this->hasMany(Vaga::class, 'idArea');
}
}
