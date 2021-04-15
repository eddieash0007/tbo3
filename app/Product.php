<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    protected $fillable =[
        'name','image','price','size','colour','details','slug','size4','size6','size8','size10','size12','size14','size16','new','sale', 'category_id'
    ];

    public function promotions()
    {
        return $this->belongsToMany('App\Promotion');
    }


    public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }

    protected $dates =['deleted_at'];
}
