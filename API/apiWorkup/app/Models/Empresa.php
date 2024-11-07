<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_empresa';

    public $timestamps = true;
    /*
|--------------------------------------------------------------------------
|Definindo chave primaria
|--------------------------------------------------------------------------
*/

    protected $primaryKey = 'idEmpresa';

/*
|--------------------------------------------------------------------------
|Definindo realacionamento
|--------------------------------------------------------------------------
*/

    public function vagasEmpresas() :HasMany
    {
        return $this->hasMany(Vaga::class, 'idEmpresa');
    }

    protected $fillable = [
        'usernameEmpresa',
        'nomeEmpresa',
        'emailEmpresa',
        'fotoEmpresa',
        'sobreEmpresa',
        'cnpjEmpresa',
        'contatoEmpresa',
        'senhaEmpresa',
        'cidadeEmpresa',
        'estadoEmpresa',
        'LogradouroEmpresa',
        'cepEmpresa',
        'numeroLograEmpresa',
        'avaliacaoEmpresa',
        'idStatus',
    ];

    public function areas()
{
    return $this->belongsToMany(Area::class, 'tb_AtuacaoEmpresa', 'idEmpresa', 'idArea');
}

public function vagas()
{
    return $this->hasMany(Vaga::class, 'idEmpresa');
}

public function status()
{
    return $this->belongsTo(Status::class, 'idStatus', 'idStatus');
}
public function usuarios()
{
    return $this->hasMany(Usuario::class, 'idEmpresa', 'idEmpresa');
}

}


