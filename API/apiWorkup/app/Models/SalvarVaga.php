<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalvarVaga extends Model
{
    use HasFactory;
    protected $table = 'tb_salvarvaga';
    protected $primaryKey = 'idSalvarVaga';

    protected $fillable = [
        'idUsuario',
        'idVaga',
    ];

    public $timestamps = false;

    public function vaga()
{
    return $this->belongsTo(Vaga::class, 'idVaga');
}
}
