<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periode extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'periodes';

    protected $primaryKey = "id_periode";

    protected $fillable = [
        "periode_penilaian",
        'smt_periode',
        'sts_periode'
    ];

    public function Inputnilai()
    {
        return $this->hasMany(Inputnilai::class, 'id_periode', 'id_periode');
    }

    public function Hasiljawaban()
    {
        return $this->hasMany(Hasiljawaban::class, 'id_periode', 'id_periode');
    }
}

