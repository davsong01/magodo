<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $setting = $this->setting;
       
   	   	return view('backend.settings_update', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $setting = Setting::first();
       
        if($request->has('image')){
            $request['rp_image'] = $this->uploadImage($request->image, 'images');
        }
        
        $setting->update($request->except(['token', 'image']));

        return back()->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function profileIndex(){
        $user = Auth::user();
   	   	return view('backend.profile_update', compact('user'));
    }

  
    public function storeProfile(Request $request){
        $user = Auth::user();
        if($request->has('image')){
			$image = $this->uploadImage($request->image, 'images/avatar');
			$request['avatar'] = 'images/avatar/' . $image;
		}else{
			$request['avatar'] = $user->avatar;
		}
      
        if($request->has('password') && !is_null($request->password)){
            $request['password'] = bcrypt($request->password);
        }else{
            $request['password'] = $user->password;
        }

        $user->update($request->all());

        return redirect(route('updateprofile'))->with('message', 'Update Successful');
    }
}
