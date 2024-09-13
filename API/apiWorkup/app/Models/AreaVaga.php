<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaga;

class AreaVaga extends Model
{
    use HasFactory;

    protected $table = 'tb_areainteressevaga';

    public $timestamps = false;

    protected $primaryKey = 'idAreaInteresseVaga';

    public function vagasPorArea()
    {
        return $this->hasMany(Vaga::class, 'idAreaInteresseVaga');
    }
}
