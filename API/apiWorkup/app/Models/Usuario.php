<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tb_usuario';
    protected $primaryKey = 'idUsuario';
    public $timestamps = true;

    protected $fillable = [
        'nomeUsuario',
        'usernameUsuario',
        'nascUsuario',
        'emailUsuario',
        'senhaUsuario',
        'contatoUsuario',
        'emailContato',
        'areaInteresseUsuario',
        'linguaUsuario',
        'ensinoMedio',
        'anoFormacao',
        'fotoUsuario',
        'fotoBanner',
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

    protected $casts = [
        'fotoUsuario' => 'string', // Armazena como string
        'fotoBanner' => 'string', // Armazena fotoBanner como string
    ];

    protected $hidden = [
        'senhaUsuario', // Oculta a senha ao serializar
    ];

    // Mutador para criptografar a senha antes de salvar
    public function setSenhaUsuarioAttribute($value)
    {
        $this->attributes['senhaUsuario'] = Hash::make($value);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class, 'tb_AreaInteresseUsuario', 'idUsuario', 'idArea');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'idStatus', 'idStatus');
    }

    public function vagas()
    {
        return $this->hasMany(VagaUsuario::class, 'idUsuario');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa', 'idEmpresa'); // Certifique-se de que as chaves estão corretas
    }

    public function denuncias()
    {
        return $this->hasMany(DenunciaUsuario::class, 'idUsuario', 'idUsuario');
    }

    // Se a relação entre Usuario e Vaga for muitos-para-muitos, descomente a função abaixo
    // public function vagas() : BelongsToMany
    // {
    //     return $this->belongsToMany(Vaga::class, 'tb_vagausuario', 'idUsuario', 'idVaga');
    // }
}
