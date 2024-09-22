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

    public $timestamps = false;
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
        'emailEmpresa', 
        'usernameEmpresa', 
        'nomeEmpresa', 
        'sobreEmpresa',
        'atuacaoEmpresa',
        'cnpjEmpresa',
        'contatoEmpresa',
        'senhaEmpresa',
        'cidadeEmpresa',
        'estadoEmpresa',
        'LogradouroEmpresa',
        'cepEmpresa',
        'numeroLograEmpresa',
    ];

    

}


