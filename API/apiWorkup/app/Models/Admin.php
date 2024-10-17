<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_admin';

    public $timestamps = true;

    protected $primaryKey = 'idAdmin';

    
    protected $fillable = [
        'nomeAdmin',
        'usernameAdmin',
        'emailAdmin',
        'contatoAdmin',
        'senhaAdmin',
        'fotoAdmin',
        'idStatus',
    ];


}
