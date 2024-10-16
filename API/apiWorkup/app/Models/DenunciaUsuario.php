<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaUsuario extends Model
{
    use HasFactory;
    protected $table = 'tb_DenunciaUsuario';
    protected $primaryKey = 'idDenunciaUsuario';

    protected $fillable = [
        'idUsuario',
        'idEmpresa',
        'Motivo',
        'idStatus',
    ];

    public $timestamps = true;

    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa', 'idEmpresa');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'idStatus', 'idStatus'); // Verifique se o campo 'idStatus' está correto
    }
}
