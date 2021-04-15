<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Alert;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $promotion = Promotion::paginate(10);
        return view ('admin.promotion.index')->with('promotions', $promotion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.promotion.create'); 
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
            'promotion' => 'required',
            'colour' => 'required'
        ]);

        Promotion::create([
            'promotion' => $request->promotion,
            'colour' => $request->colour
        ]);

        Alert::toast('Promotion Created successfully','success')->position('top-end');
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
        $this->validate($request,[
            'promotion' => 'required',
            'colour' => 'required'
        ]);

        $promotion = Promotion::find($id);

        $promotion->promotion =  $request->promotion;
        $promotion->colour =  $request->colour;

        $promotion->save();
        Alert::toast('Promotion updated successfully','success')->position('top-end');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Promotion::destroy($id);

        Alert::toast('Promotion deleted successfully','success')->position('top-end');
        return redirect()->back();
    }
}
