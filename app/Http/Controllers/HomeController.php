<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpPatient;
use App\ActivityLog;
use DB;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $Patient = ErpPatient::where('active_status', '=', 1)->get();
        $users = User::all();
        $logs = ActivityLog::orderBy('created_at', 'desc')->get();
        return view('backEnd.dashboard', compact('Patient', 'logs'));
    }
}
