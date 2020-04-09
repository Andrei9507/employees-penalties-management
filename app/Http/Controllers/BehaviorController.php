<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Behavior;
use App\Models\Penalty;
use App\Models\EmployeePenalty;

class BehaviorController extends Controller
{
    protected $behavior;

    public function __construct(Behavior $behavior, Penalty $penalty, EmployeePenalty $employeePenalty)
    {
        $this->behavior = $behavior;
        $this->penalty = $penalty;
        $this->employeePenalty = $employeePenalty;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

       $behaviors =$this->behavior->with('penalty')->get();
       return view('behaviors.index')->withBehaviors($behaviors);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penalties=$this->penalty->get();
        return view('behaviors/addbehavior')->withPenalties($penalties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->behavior->insert(($request)->except(['_token']));
        return redirect('behaviors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $penalties=$this->penalty->get();
        $behavior = $this->behavior->find($id);
        return view('behaviors.edit')->withBehavior($behavior)->withPenalties($penalties);
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
            'behavior' =>'required',
            'penalty_id' =>'required',
        ]);

        $behavior=$this->behavior->find($id)->update($request->all());
        $behaviors = $this->behavior->get();
        return view('behaviors.index')->withBehaviors($behaviors);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->behavior->find($id)->delete();
        return back();
    }
}
