<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
    protected $guarded = [];

    public function scopeRankAscending($query)
    {
        return $query->orderBy('rank', 'ASC');
    }  
}
