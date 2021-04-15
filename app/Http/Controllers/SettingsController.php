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

    public function update()
    {
        $this->validate(request(),[
            'site_name' => 'required',
            'contact_number'=>'required',
            'contact_email' => 'required',
            'address' => 'required'
        ]);
        $settings = Setting::first();

        $settings->site_name = request()->site_name;
        $settings->address = request()->address;
        $settings->contact_email = request()->contact_email;
        $settings->contact_number = request()->contact_number;

        $settings->save();
        Alert::toast('Settings Updated successfully','success')->position('top-end');
        return redirect()->back();
    }
}
