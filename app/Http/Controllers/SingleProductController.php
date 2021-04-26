<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\BigCategory;
use App\Category;
use App\Product;
use App\Promotion;
use App\Size;

class SingleProductController extends Controller
{
    public function index($slug)
    {
        $prod = Product::where('slug',$slug)->first();
       
       
       $sizes = Size::all();
        
        return view ('product')->with('settings',Setting::first())
                               ->with('bigcategories',BigCategory::all())
                               ->with('categories',Category::all())
                               ->with('product',$prod)
                               ->with('sizes', $sizes);
    }
}
