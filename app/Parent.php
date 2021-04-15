<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
    protected $fillable = ['parent_category','slug'];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
