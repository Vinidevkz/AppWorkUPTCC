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

    public $timestamps = true;

    public $fillable = [
        'nomeUsuario',
        'usernameUsuario',
        'nascUsuario',
        'emailUsuario',
        'senhaUsuario',
        'contatoUsuario',
        'fotoUsuario',
        'cidadeUsuario',
        'estadoUsuario',
        'logradouroUsuario',
        'cepUsuario',
        'numeroLograUsuario',
        'sobreUsuario',
        'formacaoCompetenciaUsuario',
        'dataFormacaoCompetenciaUsuario',
        'idStatus',
    ];

    public function areas()
    {
        return $this->belongsToMany(Area::class, 'tb_AreaInteresseUsuario', 'idUsuario', 'idArea');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'idStatus', 'idStatus');
    }

    // public function vagas() : BelongsToMany
    // {
    //     return $this->belongsToMany(Usuario::class, 'tb_vagausuario', 'idUsuario', 'idVaga');
    // }
}
