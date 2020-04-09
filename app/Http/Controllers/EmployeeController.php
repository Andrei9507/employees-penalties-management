<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Employee;
use App\Models\Behavior;
use App\Models\Penalty;
use App\Models\Statistics;
use App\Models\Notification;
use App\User;
use DB;


class EmployeeController extends Controller
{
    protected $employee;

    public function __construct
    (
    Employee $employee,
    Behavior $behavior,
    Penalty $penalty,
    Statistics $statistics
    
    )
    {   
        $this->middleware('auth', ['except' => 'index']);
        $this->employee = $employee;
        $this->behavior = $behavior;
        $this->penalty = $penalty;
        $this->statistics =$statistics;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employee->get();
        return view('employees.index')->withEmployees($employees);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees/addemployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname' =>'required',
            'lastname' =>'required',
            'adress' =>'required',
            'phone' =>'required',
        ]);

        $this->employee->insert(($request)->except(['_token']));

        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $employee =$this->employee->find($id);
        
        return view('employees.show')->withEmployee($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employee->find($id);
        
        return view('employees.edit')->withEmployee($employee);
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
        $this->validate($request,[
            'firstname' =>'required',
            'lastname' =>'required',
            'adress' =>'required',
            'phone' =>'required',
            ]);

        $employee=$this->employee->find($id)->update($request->all());
        
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employee->find($id)->delete();
        
        return back();
    }

    public function createPenalty($id)
    {
        $employee = $this->employee->find($id);
        $behaviors = $this->behavior->get();
        
        return view('employees.createpenalty')
        ->withEmployee($employee)
        ->withBehaviors($behaviors);
    }

    public function storePenalty(Request $request, $id)
    {
        $employee = $this->employee->find($id);
        $employee->appliedPenalties()->create($request->all());
        
        return redirect()->route('employees.index')->withEmployees($employee);
    }

    public function chooseEmployee()
    {   
        
        $topEmployees = $this->statistics->getTopEmployees();
        $behaviors = $this->statistics->getBehaviors();
        
        return view('home')
            ->withBehaviors($behaviors)
            ->withTopEmployees($topEmployees)
            ->withEmployees($this->employee->get());  
    }

    

        

}

