<?php

namespace App;

use App\Assembly;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [];

    public function assemblies(){
        return $this->hasMany(Assembly::class);
    }
}
