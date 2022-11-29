<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pertanyaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pertanyaans';

    protected $primaryKey = "id_pertanyaan";

    protected $fillable = [
        'id_kriteria',
        'id_indikator',
        'pertanyaan'
    ];

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }

    public function Indikator()
    {
        return $this->belongsTo(Indikator::class, 'id_indikator', 'id_indikator');
    }
    public function Hasiljawaban()
    {
        return $this->hasMany(Hasiljawaban::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
