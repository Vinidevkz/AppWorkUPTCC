<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga;

class AreaEmpresa extends Model
{
    use HasFactory;

    protected $table = 'tb_AtuacaoEmpresa';

    public $timestamps = false;

    protected $fillable = [
        'idArea',
        'idEmpresa',
    ];

/*
|--------------------------------------------------------------------------
|Definindo chave primaria
|--------------------------------------------------------------------------
*/
    protected $primaryKey = 'idAtuacaoEmpresa';

}