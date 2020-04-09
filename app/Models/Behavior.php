<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penalty;

class Behavior extends Model
{
	use SoftDeletes;
	
    protected $fillable=['behavior','penalty_id'];
	protected $dates = ['deleted_at']; 

    public function penalty()
    {
    	return $this->belongsTo(Penalty::class);
    }
}
