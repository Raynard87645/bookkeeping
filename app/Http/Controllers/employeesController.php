<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\Employee;
use Validator;
use Auth;
use DB;

class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employees.index', compact('employees')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $year = $request->year;
          $month = $request->month;
         $day = $request->day;
         $dateOfBirth = Carbon::createFromDate($year, $month, $day);
        
         if($request->snn == '*** ** ***' || $request->snn == null) 
            $snn = 10000001;
         else
             $request->snn;
         if($request->wages_amount == 'Wages' || $request->wages_amount == null) 
            $wages_amount = 0;
          else
            $request->wages_amount;
          $validator = Validator::make($request->all(), [
            
            'first_name' => 'required|max:32|string',
            'last_name' => 'required|max:32|string',
            'address_street' => 'required|max:62|string',
            'address_town' => 'required|max:62|string',
            'address_parish' => 'required|max:62|string',
            'address_country' => 'required|max:62|string',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'email' => 'email|max:255|unique:employees',
            'hire_date' => 'required',
            'work_location' => 'required',
            'wages' => 'required',
            'wages_amount' => 'required|max:8',
            'vacation' => 'required|max:62',
            
           // 'email' => 'unique:users,email_address,'.$user->id
        ]);

        if ($validator->fails()) {
            return redirect('employees/create')
                        ->withErrors($validator)
                        ->withInput();

        }
        $initial_value = 0.0;
       // return $request->vacation_balance;
        //return $emails;
       $now = Carbon::now();
        
        Employee::create([
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

        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::findOrFail($id);
       return view('employees.show', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::findOrFail($id);
       return view('employees.edit', compact('employees'));
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
        $employees = Employee::findOrFail($id);
        $employees->update($request->all());

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
        $employees = Employee::findOrFail($id);
       $employees->delete();

       return back();
    }

    public function vacation($id){
        $employee = Employee::findOrFail($id);
        return view('employees.vacation', compact('employee'));
    }
    public function salary($id)
    { 
        $employee = Employee::findOrFail($id);
        return view('employees.salary', compact('employee')); 
    }    

    public function leave($id){
        $click = Employee::findOrFail($id); 
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employees.leave', compact(['employees', 'click']));
    }

    public function benefits($id){
        $employee = Employee::findOrFail($id); 
        return view('employees.benefits', compact('employee'));
    }

    public function files($id){
        $click = Employee::findOrFail($id); 
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employees.files', compact(['employees', 'click']));
    }

    public function status($id){
        $click = Employee::findOrFail($id); 
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employees.status', compact(['employees', 'click']));
    }
    public function deposits($id){
        $click = Employee::findOrFail($id); 
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employees.deposits', compact(['employees', 'click']));
    }

    public function tax($id){
        $employees = Employee::findOrFail($id);
        return view('employees.tax', compact('employees'));
    }
     public function timesheet($id){
        $employees = Employee::findOrFail($id);
        return view('employees.timesheet', compact('employees'));
    }


}
