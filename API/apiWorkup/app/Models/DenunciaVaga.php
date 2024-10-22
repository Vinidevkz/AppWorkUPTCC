<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaVaga extends Model
{
    use HasFactory;
    protected $table = 'tb_DenunciaVaga';
    protected $primaryKey = 'idDenunciaVaga';

    protected $fillable = [
        'idUsuario',
        'idVaga',
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

    public function vaga()
    {
        return $this->belongsTo(Vaga::class, 'idVaga', 'idVaga'); // Verifique se o campo 'idVaga' está correto
    }
}
