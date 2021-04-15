<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigCategory extends Model
{
    protected $fillable  = ['name','slug'];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }


}
