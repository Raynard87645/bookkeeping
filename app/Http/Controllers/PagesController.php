<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

class PagesController extends Controller
{
    public function index(){
      if(view::exists('pages.index'))
    	return view('pages.index')
               ->with(['text' => 'Larvel'])
               ->with(['name' => 'Raynard Henry'])
               ->with(['location' => 'mandeville']);
    	//return view('pages.index', ['text' => '<b>Larvel<b>']);
     else
     	echo "View not found";
    }

    public function blade(){
      return view('blade.bladetest');
    }

}
