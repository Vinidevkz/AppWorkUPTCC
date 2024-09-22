<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\Models\AreaVaga;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaga extends Model
{
    use HasFactory;

    protected $table = 'tb_vaga';

    protected $primaryKey = 'idVaga';

    public $timestamps = false;

    /*
|--------------------------------------------------------------------------
|Definindo relacionamento
|--------------------------------------------------------------------------
*/

    public function empresa() : BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

/*
|--------------------------------------------------------------------------
|Definindo relacionamento
|--------------------------------------------------------------------------
*/

    public function areaVaga() : BelongsTo
    {
        return $this->belongsTo(AreaVaga::class, 'idAreaVaga');
    }

    // public function usuarios() : BelongsToMany
    // {
    //     return $this->belongsToMany(Usuario::class, 'tb_vagausuario', 'idVaga', 'idUsuario');
    // }

    public $fillable = [
        'nomeVaga',
        'modalidadeVaga',
        'estadoVaga',

    ];
}


