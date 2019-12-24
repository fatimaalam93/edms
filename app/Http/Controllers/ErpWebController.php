<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErpWebController extends Controller
{
    public function home()
    {
        return view('web.home');
    }

    public function behabiour()
    {
        return view('web.behabiour');
    }

    public function support_plan(){
    	return view('web.support_plan');
    }
    
}
