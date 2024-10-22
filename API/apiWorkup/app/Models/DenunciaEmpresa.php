<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaEmpresa extends Model
{
    use HasFactory;
    protected $table = 'tb_DenunciaEmpresa';
    protected $primaryKey = 'idDenunciaEmpresa';

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
