<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErpPatient extends Model
{
    public function documents(){
		return $this->hasMany('App\PatientDocument', 'patient_id', 'id');
	}
}
