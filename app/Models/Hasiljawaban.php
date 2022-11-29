<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hasiljawaban extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hasiljawaban';

    protected $primaryKey = "id_jawaban";

    protected $fillable = [
        'id_pertanyaan',
        'id_periode',
        'id_user',
        'id_guru',
        'jawaban'
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
    public function Pertanyaan()
    {
        return $this->belongsTo(Kriteria::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
