<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pawongan extends Model
{
    
    protected $fillable = [
        'nama', 'alamat', 'telp', 'photo', 'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
