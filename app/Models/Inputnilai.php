<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inputnilai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'inputnilai';

    protected $primaryKey = "id_nilai";

    protected $fillable = [
        'id_periode',
        'id_guru',
        'id_user',
        'id_kriteria',
        'total_skor',
        'nilai_perkopetensi',
        'nilai_c'
    ];

    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
    public function Periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }
    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
