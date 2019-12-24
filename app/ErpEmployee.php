<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpEmployee extends Model
{
    public function department(){
		return $this->belongsTo('App\ErpDepartment', 'department_id', 'id');
	}

	public function designation(){
		return $this->belongsTo('App\ErpDesignation', 'designation_id', 'id');
	}
}
