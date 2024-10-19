<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolas extends Model
{
    use HasFactory;

    protected $table = 'tb_escolas';
    protected $primaryKey = 'idEscolas';
    public $timestamps = true;

    protected $fillable = [
        'nomeEscola',
    ];
}
