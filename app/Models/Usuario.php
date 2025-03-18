<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'USER'; // nombre exacto de tu tabla
    protected $primaryKey = 'ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'EMAIL',
        'PASSWORD',
        'SECURITY_QUESTION',
        'SECURITY_ANSWER',
        'ID_ROLE',
        'remember_token',
    ];

    protected $hidden = ['PASSWORD'];

    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'ID_USER', 'ID');
    }
}
