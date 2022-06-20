<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use DB;

class MessageController extends ParentController
{
   
   	public function viewMessage()
    { 

   	   	return view('Message.message');

   	}

  
}
