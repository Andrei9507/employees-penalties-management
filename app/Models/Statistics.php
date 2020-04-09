<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Penalty;
use App\Models\Employee;
use App\Models\Behavior;
use App\Models\EmployeePenalty;

class Statistics {
   
    public function getBehaviors()
    {
	$currentDate = date('Y-m-d');
	
    	$behaviors = EmployeePenalty::where('active',1)
        ->whereDate('expire', '>=', $currentDate)
        ->selectRaw("behaviors.behavior as name, count(behavior_id) as y")
    	->join('behaviors','behaviors.id','=','behavior_id')
    	->groupBy("behavior_id",'behavior')
    	->get()
    	->toArray();
    	
    	return json_encode($behaviors);
    }

    public function getTopEmployees()
    {
	$currentDate = date('Y-m-d');
	
    	$employees = EmployeePenalty::where('active',1)
        ->whereDate('expire', '>=', $currentDate)
        ->selectRaw("concat(employees.firstname,' ', employees.lastname) as name, count(penalty_id) as cnt, employee_id")
    	->join('employees','employees.id','=','employee_id')
    	->groupBy('employee_id','name')
    	->orderBy('cnt', 'desc', 'limit 5')
    	->get()
	->toArray();
	    
    	$names = array_pluck($employees,'name');
    	$values = array_pluck($employees,'cnt');
    	
    	return json_encode(['names'=>$names, 'values'=>$values]);
    }
}