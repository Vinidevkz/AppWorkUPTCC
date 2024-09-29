<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\StatusVaga;

class VagaUsuario extends Model
{
    use HasFactory;

    protected $table = 'tb_VagaUsuario';

    protected $primaryKey = 'idVagaUsuario';

    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'idVaga',
        'StatusVagaUsuario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function status()
    {
        return $this->belongsTo(StatusVaga::class, 'idStatusVagaUsuario');
    }

}