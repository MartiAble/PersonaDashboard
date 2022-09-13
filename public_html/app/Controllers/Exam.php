<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Exam extends BaseController
{
    public function index()
    {
       $query = $this->request->getVar('q');
	   if(!$query){
		   return view('welcome_message');
	   }
	   if($query == '1'){
		   return view('welcome_message2');
	   }
	    if($query == '2'){
		    return view('welcome_message3');
	    }
	    if($query == '3'){
		    return view('welcome_message4');
	    }
	    if($query == '4'){
		    return view('welcome_message5');
	    }
	    if($query == '5'){
		    return view('welcome_message6');
	    }
	    if($query == 'charts'){
		    return view('charts');
	    }
		
    }
}
