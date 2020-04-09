<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Behavior;
use App\Models\Employee;
use App\Models\Penalty;

class EmployeePenalty extends Model
{
  protected $table ='employees_penalties' ;
  protected $fillable=['comment','expire','created_at','behavior_id','penalty_id','employee_id','updated_at','active'];

  public function behavior()
  {
      return $this->belongsTo(Behavior::class);
  }

  public function penalty()
  {
      return $this->belongsTo(Penalty::class);
  }
}
