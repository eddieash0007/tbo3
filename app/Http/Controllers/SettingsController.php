<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Alert;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.settings')->with('settings',Setting::first());
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'site_name' => 'required',
            'contact_number'=>'required',
            'contact_email' => 'required',
            'address' => 'required',
            'about' => 'required'
        ]);
        $settings = Setting::first();

        if($request->hasFile('logo'))
        {
            $image = $request->logo;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/logo', $image_new_name);

            $settings->logo = 'uploads/logo/'.$image_new_name;
        }

        $settings->site_name = $request->site_name;
        $settings->address = $request->address;
        $settings->contact_email = $request->contact_email;
        $settings->contact_number = $request->contact_number;
        $settings->about = $request->about;

        
        $settings->save();
        Alert::toast('Settings Updated successfully','success')->position('top-end');
        return redirect()->back();
    }

    public function carousel()
    {
        return view ('admin.setting.carousels');
    }

    public function first()
    {
        $this.validate($request,[
            'first' => 'image|mimes:jpg,jpeg,png',
            
        ]);

        if($request->hasFile('first'))
        {
            $image = $request->first;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/carousel', $image_new_name);

            $settings->path = 'uploads/carousel/'.$image_new_name;
        }



        $settings->name = 'first';

        $settings->save();
        Alert::toast('Carousel 1 uploaded successfully','success')->position('top-end');
    }

    public function second()
    {
        $this.validate($request,[
            'second' => 'image|mimes:jpg,jpeg,png',
            
        ]);

        if($request->hasFile('second'))
        {
            $image = $request->second;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/carousel', $image_new_name);

            $settings->path = 'uploads/carousel/'.$image_new_name;
        }

        $settings->name = 'second';

        $settings->save();

        Alert::toast('Carousel 2 uploaded successfully','success')->position('top-end');
    }

    public function third()
    {
        $this.validate($request,[
            'third' => 'image|mimes:jpg,jpeg,png',
            
        ]);

        if($request->hasFile('third'))
        {
            $image = $request->third;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/carousel', $image_new_name);

            $settings->path = 'uploads/carousel/'.$image_new_name;
        }

        $settings->name = 'third';

        $settings->save();

        Alert::toast('Carousel 3 uploaded successfully','success')->position('top-end');
    }

    public function fourth()
    {
        $this.validate($request,[
            'fourth' => 'image|mimes:jpg,jpeg,png',
            
        ]);

        if($request->hasFile('fourth'))
        {
            $image = $request->fourth;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/carousel', $image_new_name);

            $settings->path = 'uploads/carousel/'.$image_new_name;
        }

        $settings->name = 'fourth';

        $settings->save();

        Alert::toast('Carousel 4 uploaded successfully','success')->position('top-end');
    }
}
