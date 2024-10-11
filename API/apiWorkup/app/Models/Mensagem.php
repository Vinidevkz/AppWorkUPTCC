<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat;

class Mensagem extends Model
{

    use HasFactory;
    public $timestamps = true;
    protected $table = 'tb_Mensagem';
    protected $primaryKey = 'idMensagem';


    protected $fillable = [
        'idUsuario',
        'idEmpresa',
        'mensagem',
        'created_at',
        'updated_at',
    ];
    public function chat()
{
    return $this->belongsToMany(Chat::class, 'idChat');
}

}
