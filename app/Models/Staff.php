<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'jenis_kelamin',
        'role',
        'walikelas',
        'password',
    ];
}
