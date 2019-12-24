<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class ActivityLog extends Model
{
    public function user(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function document(){
		return $this->belongsTo('App\PatientDocument', 'document_id', 'id');
	}

	public static function updateDocumentLog($action, $document){
        $activityLog = new ActivityLog;
		$activityLog->user_id = Auth::user()->id;
		$user_details = User::find(Auth::user()->id);
		$activityLog->user_name = $user_details->name;
		$activityLog->document_id = $document;
		$document_details = PatientDocument::find($document);
		$activityLog->document_name = $document_details->document_name;
        $activityLog->action = $action;   
        // $activityLog->created_at = Carbon::now();   
		$result = $activityLog->save();
	}

	public static function updateActivityLog($action){
        $activityLog = new ActivityLog;
		$activityLog->user_id = Auth::user()->id;
		$user_details = User::find(Auth::user()->id);
		$activityLog->user_name = $user_details->name;
		$activityLog->document_name = 'application';
        $activityLog->action = $action;   
        // $activityLog->created_at = Carbon::now();   
		$result = $activityLog->save();
	}
}
