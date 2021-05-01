<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Alert;
use App\Size;
use App\Promotion;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(7);
        
        $categories = Category::all();
        $sizes = Size::all();
        $promotions = Promotion::all();
      
        return view ('admin.products.index')->with('products', $products)
                                            ->with('category', $categories)
                                            ->with('sizes', $sizes)
                                            ->with('promotions', $promotions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $sizes = Size::all();
        if($categories->count()==0 || $sizes->count() == 0 )
        {
            Alert::warning('Caution','You need to create categories and size(s) before creating a product');
           
            return redirect()->back();
        }
        return view ('admin.products.create')->with('categories', Category::all())
                                             ->with('sizes', Size::all())
                                             ->with('promotions', Promotion::all());
                                             
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'colour' => 'required',
            'details' => 'required',
            'category_id' => 'required',
            'size' => 'required'
        ]);

       
       
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/product',$image_new_name);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'uploads/product/'.$image_new_name,
            'colour' => $request->colour,
            'slug' => str_slug($request->name),
            'category_id' => $request->category_id,
            'details' => $request->details

        ]);


        $product->sizes()->attach($request->size);
        $product->promotions()->attach($request->promotion);

        Alert::toast('Product created successfully','success')->position('top-end');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Product::find($id);
        // dd($prod->name);
        // $product = $prod::all();
    
        return view ('admin.products.edit')->with('product', $prod)
                                            ->with('categories', Category::all())
                                            ->with('sizes', Size::all())
                                            ->with('promotions', Promotion::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::get();
        $arr = [];
        for ($i=0; $i < count($category); $i++) { 
            $arr[$i] = $category[$i]->id;
        }

        
        
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => ['required',
                            Rule::in ($arr)]
        ]);


        $product = Product::find($id);

        if($request->hasFile('image'))
        {
            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/product', $image_new_name);

            $product->image = 'uploads/product/'.$image_new_name;
        }

        $product->slug = str_slug($request->name);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->colour = $request->colour;
        $product->colour = $request->colour;
        $product->details = $request->details;

        

        $product->save();
        $product->sizes()->sync($request->size);
        $product->promotions()->sync($request->promotion);
        
        Alert::toast('Product updated successfully','success')->position('top-end');
        
        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        Alert::toast('Product deleted successfully','success')->position('top-end');

        return redirect()->back();
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->paginate(7);

        return view ('admin.products.trashed')->with('products', $products)
                                              ->with('categories', Category::all());
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->where('id',$id)->first();

        $product->restore();

        Alert::toast('Product restored successfully','success')->position('top-end');

        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $product = Product::withTrashed()->where('id',$id)->first();

        if (file_exists($product->image)) {

            @unlink($product->image);
     
        }

        $product->forceDelete();

        Alert::toast('Product deleted permanently','success')->position('top-end');

        return redirect()->back();
    }

    public function search()
    {

        $z = $_GET['query'];
        
        $products = Product::where('name','like', '%'.$z.'%')->paginate(5);
     
    
        
            
        $categories = Category::all();
        $sizes = Size::all();
        $promotions = Promotion::all();
        return view('admin.products.results')->with('products', $products)
                                            ->with('category', $categories)
                                            ->with('sizes', $sizes)
                                            ->with('promotions', $promotions);
    }
}
