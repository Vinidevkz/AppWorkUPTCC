<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'tb_status';
    protected $primaryKey = 'idStatus';

    protected $fillable = ['idStatus', 'tipoStatus']; 
    
    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'idStatus');
    }

    public function denuncias()
    {
        return $this->hasMany(DenunciaUsuario::class, 'idStatus', 'idStatus');
    }
}