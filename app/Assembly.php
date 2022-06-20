<?php

namespace App;

use App\District;
use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    protected $guarded = [];

    public function district(){
        return $this->belongsTo(District::class);
    }
}
