<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpEmployee;
use App\ErpDepartment;
use App\ErpDesignation;
use App\ErpBaseSetup;
use Auth;

class ErpEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = ErpEmployee::where('active_status', '=', 1)->get();
        return view('backEnd.employees.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations = ErpDesignation::all();
        $departments = ErpDepartment::all();
        $genders = ErpBaseSetup::where('base_group_id', '=', 1)->get();
        $blood_groups = ErpBaseSetup::where('base_group_id', '=', 2)->get();
        return view('backEnd.employees.employee.create', compact('designations','departments','genders','blood_groups'));
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
            'first_name'=>'required',
            'last_name'=> 'required',
            'email'=> 'required'
        ]);

         // $employee_photo = ""; 
         //    if($request->file('employee_photo') != ""){
         //       $file = $request->file('employee_photo');
         //       $employee_photo = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
         //       $file->move('public/uploads/employee/', $employee_photo);
         //       $employee_photo = 'public/uploads/employee/'.$employee_photo;
         //    }

        $employee = new ErpEmployee();
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $full_name = $request->get('first_name').' '.$request->get('last_name');
        $employee->full_name = $full_name;
        $employee->mobile = $request->get('mobile');
        $employee->emergency_no = $request->get('emergency_no');
        $employee->email = $request->get('email');
        $employee->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        $employee->permanent_address = $request->get('permanent_address');
        $employee->current_address = $request->get('current_address');
        $employee->department_id = $request->get('department_id');
        $employee->designation_id = $request->get('designation_id');
        $employee->joining_date = date('Y-m-d', strtotime($request->joining_date));
        if ($request->hasFile('employee_photo')) {
            $image = $request->file('employee_photo');
            $image_name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/employee_img');
            $imagePath = $destinationPath. "/".  $image_name;
            $image->move($destinationPath, $image_name);
            $employee->employee_photo = '/public/uploads/employee_img/'.$image_name;
        }
        $employee->gender_id = $request->get('gender_id');
        $employee->blood_group_id = $request->get('blood_group_id');
        $employee->qualifications = $request->get('qualifications');
        $employee->experiences = $request->get('experiences');
        $employee->created_by = Auth::user()->name;
        $employee->updated_by = Auth::user()->name;

        $results = $employee->save();
        if($results) {
            return redirect('/employee')->with('message-success', 'Employee has been added');
        } else {
            return redirect('/employee')->with('message-danger', 'Something went wrong');
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
        $editData = ErpEmployee::find($id);
        $designations = ErpDesignation::where('active_status','=',1)->get();
        $departments = ErpDepartment::where('active_status','=',1)->get();
        $genders = ErpBaseSetup::where('base_group_id', '=', 1)->where('active_status','=',1)->get();
        $blood_groups = ErpBaseSetup::where('base_group_id', '=', 2)->where('active_status','=',1)->get();
        return view('backEnd.employees.employee.show', compact('editData','designations','departments','genders','blood_groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = ErpEmployee::find($id);
        $designations = ErpDesignation::where('active_status','=',1)->get();
        $departments = ErpDepartment::where('active_status','=',1)->get();
        $genders = ErpBaseSetup::where('base_group_id', '=', 1)->where('active_status','=',1)->get();
        $blood_groups = ErpBaseSetup::where('base_group_id', '=', 2)->where('active_status','=',1)->get();
        return view('backEnd.employees.employee.edit', compact('editData','designations','departments','genders','blood_groups'));
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
            'first_name'=>'required',
            'last_name'=> 'required',
            'email'=> 'required'
        ]);

        $employee = ErpEmployee::find($id);
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $full_name = $request->get('first_name').' '.$request->get('last_name');
        $employee->full_name = $full_name;
        $employee->mobile = $request->get('mobile');
        $employee->emergency_no = $request->get('emergency_no');
        $employee->email = $request->get('email');
        $employee->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        $employee->permanent_address = $request->get('permanent_address');
        $employee->current_address = $request->get('current_address');
        $employee->department_id = $request->get('department_id');
        $employee->designation_id = $request->get('designation_id');
        $employee->joining_date = date('Y-m-d', strtotime($request->joining_date));
        if ($request->hasFile('employee_photo')) {
            $image = $request->file('employee_photo');
            $image_name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/employee_img');
            $imagePath = $destinationPath. "/".  $image_name;
            $image->move($destinationPath, $image_name);
            $employee->employee_photo = '/public/uploads/employee_img/'.$image_name;
        }
        $employee->gender_id = $request->get('gender_id');
        $employee->blood_group_id = $request->get('blood_group_id');
        $employee->qualifications = $request->get('qualifications');
        $employee->experiences = $request->get('experiences');
        $employee->created_by = Auth::user()->name;
        $employee->updated_by = Auth::user()->name;

        $results = $employee->update();
        if($results) {
            return redirect('/employee')->with('message-success', 'Employee has been updated');
        } else {
            return redirect('/employee')->with('message-danger', 'Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEmployeeView($id){
        $module = 'deleteEmployee';
        return view('backEnd.showDeleteModal', compact('id','module'));
    }

    public function deleteEmployee($id){
        $employee = ErpEmployee::find($id);
        $employee->active_status = 0;

        $results = $employee->update();
        if($results){
            return redirect()->back()->with('message-success-delete', 'Employee has been deleted successfully');
        }else{
            return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
        }
    }
}
