<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Behavior;
use App\Models\Penalty;
use App\Models\EmployeePenalty;
use App\User;


class Employee extends Model
{
   protected $fillable=['firstname','lastname','adress','phone','updated_at'];

   public function behavior()
   {
      return $this->hasMany(Behavior::class);
   }

   public function penalties()
   {
      return $this->hasMany(Penalty::class);
   }

   public function appliedPenalties()
   {
      return $this->hasMany(EmployeePenalty::class);
   }

   public function validPenalties()
   {
      $currentDate = date('Y-m-d');
      return $this->hasMany(EmployeePenalty::class)
      ->where('active',1) 
      ->where('expire', '>=', $currentDate);
   }

   /*
   public function validNotifications()
   {
     
      $currentDate = date('Y-m-d');
      return EmployeePenalty::join('behaviors','behaviors.id','=','employees_penalties.behavior_id')
      ->join('penalties','penalties.id','=','employees_penalties.penalty_id')
      ->join('employees','employees.id','=','employees_penalties.employee_id')
      ->where('employees_penalties.active','=',1)
      ->whereDate('expire', '>=', $currentDate)
      ->select('behaviors.*', 'penalties.*','employees.*', 'employees_penalties.*')
      ->get(array('employees_penalties.id AS test_ID'));

   }
   */

  

}
