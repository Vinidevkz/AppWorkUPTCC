<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    protected $table = 'tb_ModalidadeVaga';
    protected $primaryKey = 'idModalidadeVaga';

    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'idModalidadeVaga');
    }
}
