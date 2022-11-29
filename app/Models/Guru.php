<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gurus';

    protected $primaryKey = "id_guru";

    protected $fillable = [
        "id_guru",
        'nama_guru',
        'alamat_guru',
        'tahun_masuk',
        'tahun_keluar',
        'tlp_guru',
        'tempat_lahir',
        'tanggal_lahir',
        'no_ktp_guru',
        'no_kk_guru',
        'pen_akhir_guru',
        'jabatan_guru',
        'status_aktif_guru'
    ];

    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->hasMany(User::class, 'id_guru', 'id_guru');
    }

    public function Inputnilai()
    {
        return $this->hasMany(Inputnilai::class, 'id_guru', 'id_guru');
    }

    public function Hasiljawaban()
    {
        return $this->hasMany(Hasiljawaban::class, 'id_guru', 'id_guru');
    }
}