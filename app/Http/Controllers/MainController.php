<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class MainController extends ParentController
{
	public function welcomeMessage()
    { 
   	   	$welcomes = DB::table('pages')->where(['display' => 'Yes', 'page_name'=>'welcomemessagefull'])->first();
   	   	return view('Welcome.welcome', ['welcomes' => $welcomes]);
   	}
	
	public function statementPurpose()
    { 
   	   	$stmtpurpose = DB::table('pages')->where(['display' => 'Yes', 'page_name'=>'statementofpurpose'])->first();
   	   	return view('About.statement_purpose', ['stmtpurpose' => $stmtpurpose]);
   	}
	
	public function ourHistory()
    { 
   	   	$ourhistory = DB::table('pages')->where(['display' => 'Yes', 'page_name'=>'ourhistory'])->first();
   	   	return view('About.our_history', ['ourhistory' => $ourhistory]);
   	}
	
	public function ourfounders()
    { 
   	   	$ourfounders = DB::table('pages')->where(['display' => 'Yes', 'page_name'=>'ourfounders'])->first();
   	   	return view('About.founders', ['founders' => $ourfounders]);
   	}
	
	public function faithDeclaration()
    { 
   	   	$faithDeclaration = DB::table('pages')->where(['display' => 'Yes', 'page_name'=>'faithDeclaration'])->first();
   	   	return view('About.anchor_faith_declaration', ['faithDeclaration' => $faithDeclaration]);
   	}
	
	
  
}
