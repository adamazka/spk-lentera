<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kriteria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kriterias';

    protected $primaryKey = "id_kriteria";

    protected $fillable = [
        'nama_kriteria',
        "bobot_kriteria"
    ];

    public function Indikator()
    {
        return $this->hasMany(Indikator::class, 'id_kriteria', 'id_kriteria');
    }

    public function Pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'id_kriteria', 'id_kriteria');
    }

    public function Inputnilai()
    {
        return $this->hasMany(Inputnilai::class, 'id_kriteria', 'id_kriteria');
    }
}
