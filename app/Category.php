<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function big_category()
    {
        return $this->belongsTo('App\BigCategory');
    }

    Protected $fillable = ['name','slug','parent_category_id'];
}
