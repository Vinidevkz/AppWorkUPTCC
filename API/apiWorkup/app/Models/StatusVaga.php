<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusVaga extends Model
{
    protected $table = 'tb_StatusVagaUsuario'; // nome da tabela
    
    protected $primaryKey = 'idStatusVagaUsuario';
    // Defina a relação com VagaUsuario, se necessário
    public function vagasUsuario()
    {
        return $this->hasMany(VagaUsuario::class, 'idStatusVagaUsuario');
    }
}
