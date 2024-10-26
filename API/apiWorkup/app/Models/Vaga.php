<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\Models\Area;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaga extends Model
{
    use HasFactory;

    protected $table = 'tb_vaga';

    protected $primaryKey = 'idVaga';

    public $timestamps = true;

    /*
|--------------------------------------------------------------------------
|Definindo relacionamento
|--------------------------------------------------------------------------
*/

    public function empresa() : BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'idArea');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'idStatus', 'idStatus');
    }

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class, 'idModalidadeVaga');
    }

    public function candidatos() {
        return $this->hasMany(VagaUsuario::class, 'idVaga');
    }



    // public function usuarios() : BelongsToMany
    // {
    //     return $this->belongsToMany(Usuario::class, 'tb_vagausuario', 'idVaga', 'idUsuario');
    // }

    public $fillable = [
        'nomeVaga',
        'descricaoVaga',
        'prazoVaga',
        'salarioVaga',
        'cidadeVaga',
        'estadoVaga',
        'beneficioVaga',
        'diferencialVaga',
        'idEmpresa',
        'idArea',
        'idStatus',
        'idModalidadeVaga',
    ];
}


