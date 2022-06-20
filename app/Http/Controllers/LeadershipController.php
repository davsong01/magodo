<?php

namespace App\Http\Controllers;

use App\Leadership;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaders = Leadership::orderBy('rank', 'ASC')->get();
   	   	return view('backend.leadership.index', compact('leaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaders_count = $this->setting->number_of_leaders;
        $range = range(1, $leaders_count);
        $used_ranks = Leadership::select('rank')->get();
        
        foreach($range as $r=>$value){
            foreach($used_ranks as $ranks){
                if($ranks->rank == $value){
                    unset($range[$r]);
                }
            }
        }

   	   	return view('backend.leadership.create', compact('range'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $this->uploadImage($request->avatar, 'images/avatar');
        $avatar = 'images/avatar/' . $image;
        $leader = Leadership::create([
            'name' => $request->title,
            'position' => $request->position,
            'rank' => $request->rank,
            'image' => $avatar,
        ]);
       
		return redirect()->route('leadership.index')->with('message', 'Entry successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leadership  $leadership
     * @return \Illuminate\Http\Response
     */
    public function show(Leadership $leadership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leadership  $leadership
     * @return \Illuminate\Http\Response
     */
    public function edit(Leadership $leadership)
    {
        $leader = $leadership;
        
        return view('backend.leadership.update', compact('leader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leadership  $leadership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leadership $leadership)
    {
        if($request->has('avatar')){
            if($leadership->image != 'images/avatar/leadership.jpeg'){
                $this->deleteImage($leadership);
            }
            $image = $this->uploadImage($request->avatar, 'images/avatar');
            $avatar = 'images/avatar/' . $image;

            $request['image'] = $avatar;

        }

        $leadership->update($request->except(['avatar', '_token']));

        return back()->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leadership  $leadership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leadership $leadership)
    {
        if($leadership->image != 'images/avatar/leadership.jpeg'){
            $this->deleteImage($leadership);
        }

        $leadership->delete();

        return back()->with('message', 'Delete successful');

    }
}
