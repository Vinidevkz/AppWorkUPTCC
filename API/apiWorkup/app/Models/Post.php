<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'tb_Publicacao';
    protected $primaryKey = 'idPublicacao';


    protected $fillable = [
        'detalhePublicacao',
        'fotoPublicacao',
        'idEmpresa',
        'idVaga',
        'created_at',
        'updated_at',
    ];
}
