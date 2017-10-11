<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\Articles;
use App\User;
use Auth;
use DB;

class articlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = Auth::user()->all();
       $article = Articles::orderBy('created_at', 'desc')->paginate(10);

       
       return view('articles.index', compact(['article', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();

        Articles::create([
           'user_id' => Auth::user()->id,
           'content' => $request->content,
           'live' => (boolean)$request->live,
           'post_on' => (isset($request->post_on)) ? $request->post_on : $now
             ]);


        return redirect('/articles');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $article = Articles::findOrFail($id);
        $users = Auth::user()->all();

       return view('articles.showBlog', compact(['article', 'users']));
       
    }
    public function myblogs($id){

        $articles = Articles::findOrFail($id);
        $users = Auth::user()->all();
        
        $myblogs =  Articles::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        
       return view('articles.myblogs.index', compact(['myblogs', 'users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::findOrFail($id);
        $users = Auth::user()->all();

        return view('articles.edit', compact(['articles', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $now = Carbon::now();
       $articles = Articles::findOrFail($id);

        if($request->post_on==null){
          $articles->update(array_merge($request->all(),['post_on'=>$now,'live'=>(isset($request->live)) ? true : false])); 
           return back()->with('message', 'IT WORKS!');;
        }
        elseif (isset($request->post_on)) {
             $subject = $request->post_on ; // collect string for post_on
            $search = 'T' ; 
            $trimmed = str_replace($search, '', $subject) ; // remove T from string
            $articles->update(array_merge($request->all(),['post_on'=>$trimmed,'live'=>(isset($request->live)) ? true : false]));
            return back();
         } 
        

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $articles = Articles::findOrFail($id);
       $articles->delete();

       return back();
    }
}
        //Articles::create($request->all());
/*
        Articles::create([
           'user_id' => Auth::user()->id,
           'content' => $request->content,
           'live' => $request->live,
           'post_on' => $request->post_on,
             ]);*/

              //$article = DB::table('articles')->get();
        //$article = Articles::whereLive(1)->get();
        //$article = DB::table('articles')->whereLive(1)->get();
         //return $article;

             /* $article = Articles::findOrFail($id);
       $article->update($request->all());*/
        //return view('articles.edit', compact('article'));