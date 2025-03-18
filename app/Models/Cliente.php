<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'CLIENT';
    protected $primaryKey = 'ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'IMAGE',
        'FIRST_NAME',
        'LAST_NAME',
        'HOME_PHONE',
        'TELEPHONE_NUMBER',
        'ID_USER',
        'ID_ADDRESS',
    ];

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'ID_USER', 'ID');
    }
}
