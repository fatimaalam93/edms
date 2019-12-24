<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpDesignation;
use Auth;

class ErpDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = ErpDesignation::all();
        return view('backEnd.employees.designation.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation_name'=>'required'
        ]);
            
        $designation = new ErpDesignation();
        $designation->designation_name = $request->get('designation_name');
        $designation->created_by = Auth::user()->name;
        $designation->updated_by = Auth::user()->name;

        $result = $designation->save();
        if($result) {
            return redirect('/designation')->with('message-success', 'Designation has been added.');
        } else {
            return redirect('/designation')->with('message-success', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $editData = ErpDesignation::find($id);
        return view('backEnd.employees.designation.index', compact('editData'));
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
        $request->validate([
            'designation_name'=>'required'
        ]);
            
        $designation = ErpDesignation::find($id);
        $designation->designation_name = $request->get('designation_name');
        $designation->created_by = Auth::user()->name;
        $designation->updated_by = Auth::user()->name;

        $result = $designation->update();
        if($result) {
            return redirect('/designation')->with('message-success', 'Designation has been updated.');
        } else {
            return redirect('/designation')->with('message-success', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDesignationView($id){
        $module = 'deleteDesignation';
         return view('backEnd.showDeleteModal', compact('id','module'));
    }

    public function deleteDesignation($id){
        $result = ErpDesignation::destroy($id);
        if($result){
            return redirect()->back()->with('message-success-delete', 'Designation has been deleted successfully');
        }else{
            return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
        }
    }
}
