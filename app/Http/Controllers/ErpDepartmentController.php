<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpDepartment;
use Auth;

class ErpDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = ErpDepartment::all();
        return view('backEnd.employees.department.index', compact('departments'));
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
            'department_name'=>'required'
        ]);
            
        $department = new ErpDepartment();
        $department->department_name = $request->get('department_name');
        $department->created_by = Auth::user()->name;
        $department->updated_by = Auth::user()->name;

        $result = $department->save();
        if($result) {
            return redirect('/department')->with('message-success', 'Department has been added.');
        } else {
            return redirect('/department')->with('message-success', 'Something went wrong.');
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
        $editData = ErpDepartment::find($id);
        return view('backEnd.employees.department.index', compact('editData'));
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
            'department_name'=>'required'
        ]);
            
        $department = ErpDepartment::find($id);
        $department->department_name = $request->get('department_name');
        $department->created_by = Auth::user()->name;
        $department->updated_by = Auth::user()->name;

        $result = $department->update();
        if($result) {
            return redirect('/department')->with('message-success', 'Department has been updated.');
        } else {
            return redirect('/department')->with('message-success', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDepartmentView($id){
        $module = 'deleteDepartment';
         return view('backEnd.showDeleteModal', compact('id','module'));
    }

    public function deleteDepartment($id){
        $result = ErpDepartment::destroy($id);
        if($result){
            return redirect()->back()->with('message-success-delete', 'Department has been deleted successfully');
        }else{
            return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
        }
    }
}
