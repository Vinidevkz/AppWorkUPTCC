<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga;

class AreaInteresseUsuario extends Model
{
    use HasFactory;

    protected $table = 'tb_AreaInteresseUsuario';

    public $timestamps = false;

    protected $fillable = [
        'idArea',
        'idUsuario',
    ];

/*
|--------------------------------------------------------------------------
|Definindo chave primaria
|--------------------------------------------------------------------------
*/
    protected $primaryKey = 'idAreaInteresseUsuario';

}