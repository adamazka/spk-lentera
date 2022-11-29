<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'roles';

    protected $primaryKey = "id_role";

    protected $fillable = [ 
        "role_name", 
        'deskripsi'
    ];

    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}
