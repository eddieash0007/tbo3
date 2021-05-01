<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Alert;
use App\BigCategory;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'desc')->paginate(6);
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
        $bigcategories = BigCategory::all();
        if($bigcategories->count()==0 )
        {
            Alert::warning('Caution','You need to create  parent categories before creating a category');
           
            return redirect()->route('parentcategories.create');
        }
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
        $category->description = $request->description;
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


        $bigcategory = BigCategory::get();
        $arr = [];
        for ($i=0; $i < count($bigcategory); $i++) { 
            $arr[$i] = $bigcategory[$i]->id;
        }
        
        $this->validate($request,[
            'name' => 'required',
            'big_category_id' => ['required',
            Rule::in ($arr)]
        ]);


        

        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->description = $request->description;
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

    public function search()
    {

        $z = $_GET['query'];
        
        $categories = Category::where('name','like', '%'.$z.'%')->paginate(5);
     
    
        
            
       
       
        return view('admin.categories.results')->with('categories', $categories)
                                             ->with('bigcategories', BigCategory::all());
    }
}
