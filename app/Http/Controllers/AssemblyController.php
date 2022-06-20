<?php

namespace App\Http\Controllers;

use App\Assembly;
use Illuminate\Http\Request;

class AssemblyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assemblys = Assembly::orderBy('created_at', 'DESC')->get();
		
   	   	return view('backend.assemblys.index', compact('assemblys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   	   	return view('backend.assemblys.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assembly = Assembly::create($request->all());

		return redirect()->route('assemblys.index')->with('message', 'District successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assembly  $assembly
     * @return \Illuminate\Http\Response
     */
    public function show(Assembly $assembly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assembly  $assembly
     * @return \Illuminate\Http\Response
     */
    public function edit(Assembly $assembly)
    {
   	   	return view('backend.assemblys.update', compact('assembly'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assembly  $assembly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assembly $assembly)
    {
        $assembly->update($request->all());

		return back()->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assembly  $assembly
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assembly $assembly)
    {
        $assembly->delete();

		return back()->with('message', 'delete successful');
    }
}
