<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    //
	protected $fillable = [
        'todo', 'updated_at',
    ];

    public $timestamps = false;
}
