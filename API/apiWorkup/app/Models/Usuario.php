<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tb_usuario';

    protected $primaryKey = 'idUsuario';

    public $timestamps = false;

    public $fillable = [
        'nomeUsuario',
        'usernameUsuario',
        'nascUsuario',
        'emailUsuario',
        'senhaUsuario',
        'areaInteresseUsuario',
        'contatoUsuario',
        'cidadeUsuario',
        'estadoUsuario',
        'logradouroUsuario',
        'cepUsuario',
        'numeroLograUsuario',
        'sobreUsuario',
        'formacaoCompetenciaUsuario',
        'dataFormacaoCompetenciaUsuario',
    ];

    // public function vagas() : BelongsToMany
    // {
    //     return $this->belongsToMany(Usuario::class, 'tb_vagausuario', 'idUsuario', 'idVaga');
    // }
}
