<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Setting;
use App\BigCategory;
use App\Category;
use Alert;

class CartController extends Controller
{
   public function add(Product $product, Request $request)
   {
    $user_id = $request->session()->regenerate();

      $a = \Cart::add(array(
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $product
    ));

    

    return redirect()->back();
    
   }

   public function index(Request $request)
   {
    $user_id = $request->session()->regenerate();

    $cartitems = \Cart::getContent();
 
       return view('cart', compact('cartitems'))->with('user_id',$user_id)
                          ->with('settings',Setting::first())
                          ->with('bigcategories',BigCategory::all())
                          ->with('categories',Category::all());

   
   }

   public function destroy(Request $request, $itemId)
   {
      $user_id = $request->session()->regenerate();

      \Cart::remove($itemId);

      return redirect()->back();


   }

   public function update(Request $request, $itemId)
   {
      $user_id = $request->session()->regenerate();

      $s=\Cart::update($itemId, [
         'quantity' => array(
            'relative' => false,
            'value' =>request('quantity')
         )
      ]);
     
      return back();
   }

   public function checkout()
   {
      if(\Cart::isEmpty())
      {
         Alert::warning('Caution','You need to have at least one product in your cart before proceeding to check out');
           
            return redirect()->back();
      }
      return view('checkout')->with('settings',Setting::first())
                              ->with('bigcategories',BigCategory::all())
                              ->with('categories',Category::all());
   }

}
