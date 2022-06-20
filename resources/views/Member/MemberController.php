<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use DB;

class MemberController extends ParentController
{
	public function viewMemberLogin()
    { 
   	   	$member = DB::select("select * from pages where display = 'Yes' and page_name='welcomemessage1'");

		return view('Member.memberLogin', compact('member'));
   	}
	
  
}
