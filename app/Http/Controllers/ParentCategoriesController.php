<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BigCategory;
use App\Category;
use App\Product;
use Alert;

class ParentCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bigcategories = BigCategory::all();
        return view ('admin.parentcategories.index')->with('parent_categories', $bigcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parentcategories.create');
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
            'parent_category' => 'required'
        ]);

        

        $big_category = new BigCategory;

        $big_category->name = $request->parent_category;
        $big_category->slug = str_slug($request->parent_category);
        
        $big_category->save();

        
        Alert::toast('Parent Category created successfully','success')->position('top-end');    
        return redirect()->route('parentcategories');
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
        //
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
        $big_category = BigCategory::find($id);

        $big_category->name = $request->name;
        $big_category->slug = str_slug($request->parent_category);
        
        $big_category->save();

        Alert::toast('Parent Category updated successfully','success')->position('top-end');
        return redirect()->route('parentcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $big_category = BigCategory::find($id);

        foreach($big_category->categories as $category)
        {
            // $category->forcedelete();
            $category_ids = $category->id;
            
            $products = Product::where("category_id", $category->id)->get();
            for ($i=0; $i < count($products); $i++) 
            { 
                $products[$i]->forcedelete();
            }
            
            $category->forcedelete();
            
        }

        $big_category->delete();

        Alert::toast('Parent Category deleted successfully','success')->position('top-end');
        return redirect()->back();
    }
}
