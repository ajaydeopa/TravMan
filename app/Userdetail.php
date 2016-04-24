<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    //
    protected $fillable = [
        'full_name', 'gender', 'birthday', 'martial_status', 'phone', 'summary',
    ];

    public $timestamps = false;
}
