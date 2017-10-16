<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\ProductInvoice;
use Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class invoiceController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $productinvoices = ProductInvoice::orderBy('created_at', 'desc')->paginate(10);
       $invoices = Invoice::orderBy('created_at', 'desc')->paginate(10);
        return view('invoices.index', compact(['invoices','productinvoices']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


       
       return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      /*dd($request);
      return $request->all();*/
        /*Employee::create([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'address_street' =>$request->address_street, 
           'address_town' => $request->address_town,
           'address_parish' =>$request->address_parish, 
           'address_country' =>$request->address_country,
           'dob' => $dateOfBirth->toDateString(),
           'email' => $request->email,
           'ssn' => (isset($request->snn)) ? $request->snn : $snn,
           'hire_date' => $request->hire_date,
           'work_location' =>$request->work_location, 
           'wages' => $request->wages,
           'wages_amount' => (isset($request->wages_amount)) ? $request->wages_amount : $wages_amount,
           'vacation' => $request->vacation,
           'effective_date' => (isset($request->effective_date)) ? $request->effective_date : $now->toDateString(),
           'vacation_balance' => (isset($request->vacation_balance)) ? $request->input('vacation_balance') : $initial_value,
           'vacation_type' => (isset($request->vacation_type)) ? $request->vacation_type : "N/A",
           'vacation_rate' => (isset($request->vacation_rate)) ? $request->vacation_rate : $initial_value,
           'vacation_date' => (isset($request->effective_date)) ? $request->effective_date : $now->toDateString(),
             ]);

        return redirect('/invoices');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $productinvoices = ProductInvoice::findOrFail($id);
       $invoices = Invoice::findOrFail($id);
       return view('invoices.show', compact(['invoices','productinvoices']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $productinvoices = ProductInvoice::findOrFail($id);
        $invoices = Invoice::findOrFail($id);
       return view('invoices.edit', compact(['invoices','productinvoices']));
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
        $ProductInvoice = ProductInvoice::findOrFail($id);
        $invoices = Invoice::findOrFail($id);
        $invoices->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $ProductInvoice = ProductInvoice::findOrFail($id);
       $invoices = Invoice::findOrFail($id);
       $invoices->delete();

       return back();
    }
    public function estimate($id){
      $estimates = Invoice::findOrFail($id);
      return view('invoices.index', compact('estimate'));
     }
    // public function invoiceform(){
    //     return view('invoices.invoiceform');
    // }

  public function testform() {
    $rules = array(
        'field1' => 'date',
        'field2' => 'required'
    );

    $validator = Validator::make(
        Invoice::all(),
        $rules
    );
    if ($validator->fails()) {
        return Redirect::back()->withErrors($validator);
    }

    return Redirect::back();
}
}
