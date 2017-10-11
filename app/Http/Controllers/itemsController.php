<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\carbon;
use App\Articles;
use App\Items;
use App\User;
use Auth;
use DB;

class itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Items = Items::orderBy('created_at', 'desc')->paginate(10);
        //$users = Auth::user()->all();
        
       return view('items.index', compact('Items', 'users'));
    }
    public function data()
    {
       
       $Items = Items::orderBy('created_at', 'desc')->paginate(10);
       return view('items.data', compact('Items'));
       
    }
    public function import(Request $request)
    {
       
          if($request->file('items'))
            {
              $path = $request->file('items')->getRealPath();
              $data = Excel::load($path, function($reader) {
                  })->get();

               if(!empty($data) && $data->count())
                 {
                  $data = $data->toArray();
                  for($i=0;$i<count($data);$i++)
                    {
                    $dataImported[] = $data[$i];
                   }
                 }
            Items::insert($dataImported);
            }
          
       return back();
     }

    public function export(){

     
        $Items = Items::all();
          Excel::create('Items', function($excel) use($Items) {
              $excel->sheet('ExportFile', function($sheet) use($Items) {
                  $sheet->fromArray($Items);
              });
          })->export('csv');
       
       return back();
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = new Items;

        $items->item_name = $request->item_name;
        $items->item_amount = $request->item_amount;
        $items->item_short_code = $request->item_short_code;

        $items->save();
        
        return redirect('/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $items = Items::findOrFail($id);
        //$users = Auth::user()->all();

       return view('items.show', compact(['items', 'users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Items::findOrFail($id);
        //$users = Auth::user()->all();

        return view('items.edit', compact(['items', 'users']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Items::findOrFail($id);
       $items->delete();

       return redirect('/items');
    }
}
