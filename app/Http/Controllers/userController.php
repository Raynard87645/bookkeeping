<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\http\Requests;

use App\User;

class userController extends Controller
{
  public function index()
   {
               /* //get all users to be displayed
             	  $users = User::all();
                
                //get the user to display by number amount and display by arrows
                $users = User::simplePaginate(10);
                */

                //get the user to display by number amount and display by arrows and number
                $users = User::paginate(10);

    return view('Admin.users.index', compact('users'));
   }

  public function create(){
  	return view('Admin.users.create');
  }
  public function store(Request $request){
    User::create($request->all());
    return 'success';
  	return $request->all();
  	
  }
  public function profile(){

     return view('profile');
    
    //return $id;
  }


}


?>