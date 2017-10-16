<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class pdfFormsController extends Controller
{
    public function index(){
    	return view('templates.index');
    }
}
