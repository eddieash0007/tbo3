<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Alert;
use App\BigCategory;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(6);
        return view('admin.categories.index')->with('categories', $categories)
                                             ->with('bigcategories', BigCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create') ->with('bigcategories', BigCategory::all());;
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
            'big_category_id' => 'required'
        ]);

        

        $category = new Category;

        $category->name = $request->name;
        $category->big_category_id = $request->big_category_id;
        $category->slug = str_slug($request->name);
        
        $category->save();

        
        Alert::toast('Category created successfully','success')->position('top-end');    
        return redirect()->route('categories.index');


        
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
        // $category = Category::find($id);

        // return view ('admin.categories.edit')->with('categories',$category);        
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
       

        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->big_category_id = $request->big_category_id;
        
        $category->save();

        Alert::toast('Category updated successfully','success')->position('top-end');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        foreach($category->products as $product)
       {
            $product->forcedelete();
       }

        $category->delete();

        Alert::toast('Category deleted successfully','success')->position('top-end');
        return redirect()->back();
    }
}
