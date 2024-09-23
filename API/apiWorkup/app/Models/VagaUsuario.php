<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga;

class VagaUsuario extends Model
{
    use HasFactory;

    protected $table = 'tb_VagaUsuario';

    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'idVaga',
    ];

/*
|--------------------------------------------------------------------------
|Definindo chave primaria
|--------------------------------------------------------------------------
*/
    protected $primaryKey = 'idVagaUsuario';

}