<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Penalty;
use Session;
use Auth;

class PenaltyController extends Controller
{
    protected $penalty;

    public function __construct(Penalty $penalty)
    {
        $this->penalty = $penalty;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $penalties =$this->penalty->get();

       return view('penalties.index')->withPenalties($penalties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == '2')
            return view('penalties/addpenalty');
        else 
            return redirect()->route('penalties.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'penalty' => 'required'
        ]);

        $this->penalty->insert(($request)->except(['_token']));
       
        return redirect('penalties');
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
        $penalty = $this->penalty->find($id);

        return view('penalties.edit')->withPenalty($penalty);
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
            'penalty' =>'required',
        ]);

        $penalty=$this->penalty->find($id)->update($request->all());
        $penalties = $this->penalty->get();

        return view('penalties.index')->withPenalties($penalties);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $this->penalty->find($id)->delete();
        
        return back();
    }
}
