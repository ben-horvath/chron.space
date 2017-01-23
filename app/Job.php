<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['name', 'hours'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
