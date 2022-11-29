<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indikator extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'indikators';

    protected $primaryKey = "id_indikator";

    protected $fillable = [
        'id_kriteria',
        'nama_indikator'
    ];

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }

    public function Pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'id_indikator', 'id_indikator');
    }
}
