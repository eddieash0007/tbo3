<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\BigCategory;
use App\Category;
use App\Product;
use App\Promotion;
use Cart;


class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')->with('settings',Setting::first())
                            ->with('bigcategories',BigCategory::all())
                            ->with('categories',Category::all());
    }

    public function SingleCategory( $slug)
    {
       
        $category = Category::where('slug',$slug)->first();
        $z = $category->id;
        $a = Product::where('category_id',$z)->get();
        
        return view('category')->with('settings',Setting::first())
                               ->with('bigcategories',BigCategory::all())
                               ->with('categories',Category::all())
                               ->with('products',Product::all())
                               ->with('title',$category)
                               ->with('promotion', Promotion::all())
                               ->with('prods', $a);
    }
}
