<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $primaryKey = "id_user";

    protected $fillable = [
        'id_role',
        'username',
        'password',
        'id_guru',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    public function Role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function Inputnilai()
    {
        return $this->hasMany(Inputnilai::class, 'id_user', 'id_user');
    }
    public function Hasiljawaban()
    {
        return $this->hasMany(Hasiljawaban::class, 'id_user', 'id_user');
    }
}
