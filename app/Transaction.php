<?php

namespace App;

use App\User;
use App\Media;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function media(){
        return $this->belongsTo(Media::class, 'product');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
