<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class profileController extends Controller
{
    public function profile($username){
    
  // $users = User::paginate(10);
    	$user =  User::whereUsername($username)->first();
   return view('user.profile', compact('user'));
    //return $id;
  }

}
