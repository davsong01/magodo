<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use DB;

class AboutController extends ParentController
{
   //HISTORY
   	public function viewHistory()
    { 
   	   	return view('About.our_history');
   	}

   	//CORE VALUES
   	public function viewCoreValues()
    { 
   	   	return view('About.our_core_values');
   	}

   	//STATEMENT OF PURPOSE
   	public function viewStatementPurpose()
    { 
   	   	return view('About.statement_purpose');

   	}

   	//Beliefs
   	public function viewOurBeliefs()
    { 
   	   	return view('About.our_beliefs');
   	}

   	//Faith Declaration
   	public function viewFaithDeclaration()
    { 
   	   	return view('About.anchor_faith_declaration');
   	}

   	//Regional Pastor
   	public function viewRegionalPastor()
    { 
   	   	return view('About.meet_our_regional_pastor');
   	}

   	//Resident Pastor
   	public function viewResidentPastor()
    { 
   	   	return view('About.meet_our_resident_pastor');
   	}

  
}
