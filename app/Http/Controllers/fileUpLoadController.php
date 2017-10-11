<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Items;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class fileUpLoadController extends Controller
{
    public function index()
    {
       return view('uploads.index');
    }

    public function import(Request $request)
    {
       $fileupload = array("items", "sales", "image" );
          if($request->file('fileupload[0]'))
            {
              $path = $request->file('fileupload[0]')->getRealPath();
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
           elseif($request->file('fileupload[1]'))
            {
              $path = $request->file('fileupload[1]')->getRealPath();
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
            elseif($request->file('fileupload[2]'))
            {
              $path = $request->file('fileupload[2]')->getRealPath();
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
      $filedownload = array("Items", "Sales", "image" );
      

      if ($filedownload[0]) {
        $Items = Items::all();
          Excel::create('items', function($excel) use($Items) {
              $excel->sheet('ExportFile', function($sheet) use($Items) {
                  $sheet->fromArray($Sales);
              });
          })->export('csv');
        }
       elseif ($filedownload[1]) {
         $Sales = Sales::all();
          Excel::create('sales', function($excel) use($Sales) {
              $excel->sheet('ExportFile', function($sheet) use($Sales) {
                  $sheet->fromArray($Sales);
              });
          })->export('csv');
        }
      elseif ($filedownload[2]) {
      $Images = Images::all();
     /* Excel::create('sales', function($excel) use($Sales) {
          $excel->sheet('ExportFile', function($sheet) use($Sales) {
              $sheet->fromArray($Sales);
          });
        })->export('csv');
*/
       }
    }



     public function upload()
    {
        $Items = Items::orderBy('created_at', 'desc')->paginate(10);
        
        
       return view('items.upload', compact('Items'));
       
    }
    public function import.items(Request $request)
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
       
       echo "I am here";
    }

}
