<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linguas extends Model
{
    use HasFactory;

    protected $table = 'tb_linguas';
    protected $primaryKey = 'idLingua';
    public $timestamps = true;

    protected $fillable = [
        'nomeLingua',
    ];
}
