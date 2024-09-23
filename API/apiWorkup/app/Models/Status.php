<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'tb_status';
    protected $primaryKey = 'idStatus';

    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'idStatus');
    }
}