<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use DB;
use App\District;

class DistrictController extends ParentController
{
   
   	public function index()
    { 

		$districts = District::orderBy('created_at', 'DESC')->get();
		
   	   	return view('backend.districts.index', compact('districts'));

   	}

	public function create(District $district){
   	   	return view('backend.districts.create');
	}

	public function edit(District $district){
   	   	return view('backend.districts.update', compact('district'));
	}

	public function update(District $district, Request $request){
		
		$district->update($request->all());

		return back()->with('message', 'Update successful');
	}

	public function store(Request $request){
		
		$district = District::create($request->all());

		return redirect()->route('districts.index')->with('message', 'District successfully added');
	}

	public function destroy(District $district){
		$district->delete();

		return back()->with('message', 'delete successful');
	}
}
