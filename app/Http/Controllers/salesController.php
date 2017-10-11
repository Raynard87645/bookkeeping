<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\carbon;
use App\Articles;
use App\Sales;
use App\User;
use Auth;
use DB;

class salesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sales = Sales::orderBy('created_at', 'desc')->paginate(10);
       // $users = Auth::user()->all();
        
       return view('sales.index', compact('Sales', 'users'));
    }
    
    public function import(Request $request)
    {
       
        if($request->file('sales'))
            {
              $path = $request->file('sales')->getRealPath();
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
            Sales::insert($dataImported);
            }   
       return back();

     }

    public function export(){
      
      echo "I am here";
         $Sales = Sales::all();
          Excel::create('sales', function($excel) use($Sales) {
              $excel->sheet('ExportFile', function($sheet) use($Sales) {
                  $sheet->fromArray($Sales);
              });
          })->export('csv');
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
