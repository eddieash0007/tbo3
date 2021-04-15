<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable =
    [
       'promotion','colour'     
    ];

    public function products()
    {
        return $this->belongsToMany('App\Products');
    }
}
