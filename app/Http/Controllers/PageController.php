<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){

    }
    
    public function create(){

    }

    public function store(Request $request){

    }

    public function edit(Page $page){

    }

    public function destroy(Page $page){
        $page->delete();
        return back()->with('message', 'Page deleted');
    }
}
