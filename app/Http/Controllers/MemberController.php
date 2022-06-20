<?php

namespace App\Http\Controllers;

use App\User;
use App\Page\Page;
use App\Http\Requests;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends ParentController
{
	public function viewMemberLogin()
    { 
      
   	   	$member = User::all();
			//   Page::where(['display' => 'Yes', 'page_name' => 'welcomemessage1',])->first();
			  dd($member);
		return view('Member.memberLogin', compact('member'));
   	}
	
  
}
