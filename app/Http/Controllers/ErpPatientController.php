<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ErpPatient;
use App\PatientDocument;
use App\ErpEmployee;
use App\ErpDepartment;
use App\ErpDesignation;
use App\ErpBaseSetup;
use Auth;
use App\ErpSupportPlan;
use PDF;
use Illuminate\Support\Facades\Response;
use App\ActivityLog;

class ErpPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = ErpPatient::where('active_status', '=', 1)->get();
        return view('backEnd.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $support_plans = ErpSupportPlan::all();
        return view('backEnd.patients.create', compact('support_plans','departments','genders','blood_groups'));
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
            'patient_id'=>'required',
            'first_name'=> 'required',
            'sur_name'=> 'required',
            'title'=> 'required',
            'date_of_birth'=> 'required'
        ]);

        $signature = ""; 
            if($request->file('signature') != ""){
               $file = $request->file('signature');
               $signature = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
               $file->move('public/uploads/signature/', $signature);
               $signature = 'public/uploads/signature/'.$signature;
            }

        $support_plan = array();
        if (empty($request->support_plan)) {
            $support_plan = '';
        } else {
            $support_plan = implode(',', $request->support_plan);
        }

        if (empty($request->date_of_birth)) {
            $date_of_birth = null;
        } else {
            $date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        }

        
        if (empty($request->date_of_death)) {
            $date_of_death = null;
        } else {
            $date_of_death = date('Y-m-d', strtotime($request->date_of_death));
        }

        if (empty($request->behavihour_date)) {
            $behavihour_date = null;
        } else {
            $behavihour_date = date('Y-m-d', strtotime($request->behavihour_date));
        }

        $patients = new ErpPatient();
        $patients->patient_id = $request->get('patient_id');
        $patients->title = $request->get('title');
        $patients->first_name = $request->get('first_name');
        $patients->sur_name = $request->get('sur_name');
        $patients->last_name = $request->get('middle_name');
        $full_name = $request->get('first_name').' '.$request->get('sur_name').' '.$request->get('middle_name');
        $patients->full_name =  $full_name;
        $patients->mobile = $request->get('mobile');
        $patients->nhs_no = $request->get('nhs_no');
        $patients->post_code = $request->get('post_code');
        $patients->date_of_birth = $date_of_birth;
        $patients->date_of_death = $date_of_death;
        $patients->next_of_kin = $request->get('next_of_kin');
        $patients->gender = $request->get('gender');
        $patients->address = $request->get('address');
        $patients->support_plan = $support_plan;
        $patients->behaviour = $request->behaviour;
        $patients->education = $request->education;
        $patients->daily_living_skills = $request->daily_living_skills;
        $patients->communication = $request->communication;
        $patients->signature=$signature;
        $patients->position = $request->position;
        $patients->behabiour_date = $behavihour_date;
        $patients->gp_details = $request->get('gp_details');
        $patients->created_by = Auth::user()->id;
        $results = $patients->save();

        
        if($results) {
            return redirect('/patient')->with('message-success', 'Patient has been added');
        } else {
            return redirect('/patient')->with('message-danger', 'Something went wrong');
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
        $patient = ErpPatient::find($id);
        $documents = PatientDocument::where('active_status', 1)->get();
        return view('backEnd.patients.show', compact('patient', 'documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $support_plans = ErpSupportPlan::all();
        $editData = ErpPatient::find($id);
        return view('backEnd.patients.edit', compact('editData', 'support_plans'));
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
        // echo "<pre>";
        // print_r($_POST);
        // exit;

        $request->validate([
            'patient_id'=>'required',
            'first_name'=> 'required',
            'sur_name'=> 'required',
            'title'=> 'required',
            'date_of_birth'=> 'required'
        ]);

        $signature = ""; 
            if($request->file('signature') != ""){
               $file = $request->file('signature');
               $signature = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
               $file->move('public/uploads/signature/', $signature);
               $signature = 'public/uploads/signature/'.$signature;
            }


        $support_plan = array();
        if (empty($request->support_plan)) {
            $support_plan = '';
        } else {
            $support_plan = implode(',', $request->support_plan);
        }

        if (empty($request->date_of_birth)) {
            $date_of_birth = null;
        } else {
            $date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        }

        if (empty($request->date_of_death)) {
            $date_of_death = null;
        } else {
            $date_of_death = date('Y-m-d', strtotime($request->date_of_death));
        }

        if (empty($request->behabiour_date)) {
            $behabiour_date = null;
        } else {
            $behabiour_date = date('Y-m-d', strtotime($request->behabiour_date));
        }

        $patients = ErpPatient::find($id);
        $patients->patient_id = $request->get('patient_id');
        $patients->title = $request->get('title');
        $patients->first_name = $request->get('first_name');
        $patients->sur_name = $request->get('sur_name');
        $patients->last_name = $request->get('middle_name');
        $full_name = $request->get('first_name').' '.$request->get('sur_name').' '.$request->get('middle_name');
        $patients->full_name = $full_name;
        $patients->mobile = $request->get('mobile');
        $patients->nhs_no = $request->get('nhs_no');
        $patients->post_code = $request->get('post_code');
        $patients->date_of_birth = $date_of_birth;
        $patients->date_of_death = $date_of_death;
        $patients->next_of_kin = $request->get('next_of_kin');
        $patients->address = $request->get('address');
        $patients->support_plan = $support_plan;
        $patients->gp_details = $request->get('gp_details');
        $patients->behaviour = $request->behaviour;
        $patients->behaviour = $request->behaviour;
        $patients->education = $request->education;
        $patients->daily_living_skills = $request->daily_living_skills;
        $patients->signature=$signature;
        $patients->position = $request->position;
        $patients->behabiour_date = $behabiour_date;
        $patients->updated_by = Auth::user()->name;
        $results = $patients->update();
         if($results) {
            return redirect('/patient')->with('message-success', 'Patient has been updated');
        } else {
            return redirect('/patient')->with('message-danger', 'Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePateientView($id){
        $module = 'deletePateient';
        return view('backEnd.showDeleteModal', compact('id','module'));
    }

    public function deletePateient($id){
        $employee = ErpPatient::find($id);
        $employee->active_status = 0;

        $results = $employee->update();
        if($results){
            return redirect()->back()->with('message-success-delete', 'Patient has been deleted successfully');
        }else{
            return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
        }
    }

    public function createDoc($id)
    {
        $patient = ErpPatient::find($id);
        return view('backEnd.patients.createDoc', compact('patient'));
    }

    public function storeDoc(Request $request)
    {
        $request->validate([
            'document_type_code'=>'required',
            'doc_type'=>'required',
            'document_name'=>'required',
            'owner'=> 'required',
            'upload_document'=> 'required|mimes:pdf,doc,docx,xls,xlsx,csv,zip,png,jpg,jpeg',
        ]);

        $document = new PatientDocument();
        $document->patient_id = $request->patient_id;
        $document->document_type_code = $request->document_type_code;
        $document->doc_type = $request->doc_type;
        $document->document_name = $request->get('document_name');
        $document->owner = $request->owner;
        $document->speciality = $request->speciality;
        $document->consultant = $request->consultant;
        $document->acl = $request->acl;
        $document->version_no = 1;
        if ($request->hasFile('upload_document')) {
            $upload = $request->file('upload_document');
            $upload_name =  time() . $upload->getClientOriginalName();
            $destinationPath = public_path('/uploads/documents');
            $upload->move($destinationPath, $upload_name);
            $document->upload_document = '/uploads/documents/'.$upload_name;
        }

        $result = $document->save();

        ActivityLog::updateDocumentLog('created document',  $document->id);

        if($result) {
            return redirect()->route('patient.show', [$document->patient_id])->with('message-success', 'Document has been uploaded successfully');
        } else {
            return redirect()->back()->with('message-danger', 'Something went wrong. Please try again');
        }
    }

    public function editDoc($id)
    {
        $editData = PatientDocument::find($id);
        return view('backEnd.patients.editDoc', compact('editData'));
    }

    public function updateDoc(Request $request, $id)
    {
        $request->validate([
            'document_type_code'=>'required',
            'doc_type'=>'required',
            'document_name'=>'required',
            'owner'=> 'required',
            'upload_document'=> 'mimes:pdf,doc,docx,xls,xlsx,csv,zip,png,jpg,jpeg',
        ]);


        $doc = PatientDocument::find($id);
        $doc->active_status = 0;
        $doc->update();

        $document = new PatientDocument();
        $document->patient_id = $doc->patient_id;
        $document->document_type_code = $request->document_type_code;
        $document->doc_type = $request->doc_type;
        $document->document_name = $request->get('document_name');
        $document->owner = $request->owner;
        $document->speciality = $request->speciality;
        $document->consultant = $request->consultant;
        $document->acl = $request->acl;
        $document->version_no = $doc->version_no;
        $document->previous_id = $doc->id;
        if ($request->hasFile('upload_document')) {
            $upload = $request->file('upload_document');
            $upload_name =  time() . $upload->getClientOriginalName();
            $destinationPath = public_path('/uploads/documents');
            $upload->move($destinationPath, $upload_name);
            $document->upload_document = '/uploads/documents/'.$upload_name;
        } else{
            $document->upload_document = $doc->upload_document;
        }
        $result = $document->save();

        ActivityLog::updateDocumentLog('updated document',  $document->id);

        if($result) {
            return redirect()->route('patient.show', $document->patient_id)->with('message-success', 'Document has been updated successfully');
        } else {
            return redirect()->back()->with('message-danger', 'Something went wrong. Please try again');
        }
    }

    public function deleteDocumentView($id){
        $module = 'deleteDocument';
        return view('backEnd.showDeleteModal', compact('id','module'));
    }

    public function deleteDocument($id){
        $document = PatientDocument::find($id);
        $document->active_status = 0;
        $results = $document->update();

        if($document->previous_id){
            $previous_doc = PatientDocument::find($document->previous_id);
            $previous_doc->active_status = 1;
            $previous_doc->update();
        }

        ActivityLog::updateDocumentLog('deleted document',  $document->id);

        if($results){
            return redirect()->back()->with('message-success-delete', 'Document has been deleted successfully');
        }else{
            return redirect()->back()->with('message-danger-delete', 'Something went wrong, please try again');
        }
    }

    public function documentPdf($id) {
        $document = PatientDocument::find($id);
        $file = $document->upload_document;
        $pathToFile = public_path().$file;

        return Response::file($pathToFile);
    }

    public function generatePDF($id){
        $document = PatientDocument::find($id);
        $file = $document->upload_document;
        $pathToFile = public_path().$file;

        return Response::download($pathToFile);
    }
    
    public function patient_demog($id){
        $data = ErpPatient::where('id','=', $id)->first();
        $result = [
            'patient_id' => $data->patient_id,
            'title' => $data->title,
            'first_name' => $data->first_name,
            'middle_name' => $data->last_name,
            'sur_name' => $data->sur_name,
            'behaviour' => $data->behaviour,
            'date_of_birth' => date('Y-m-d', strtotime($data->date_of_birth)),
            'nhs_no' => $data->nhs_no,
            'mobile' => $data->mobile,
            'post_code' => $data->post_code,
            'address' => $data->address,
            'gp_details' => $data->gp_details,
            'next_of_kin' => $data->next_of_kin,
            ];
        //$data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('backEnd.patients.patient_demog', $result);
  
        return $pdf->download('patient_demographic.pdf');
    }

    public function support_plan($id){
        $data = ErpPatient::where('id','=', $id)->first();
        $support_plans = ErpSupportPlan::all();
        $result = [
            'patient_id' => $data->patient_id,
            'title' => $data->title,
            'first_name' => $data->first_name,
            'middle_name' => $data->last_name,
            'sur_name' => $data->sur_name,
            'behaviour' => $data->behaviour,
            'date_of_birth' => date('Y-m-d', strtotime($data->date_of_birth)),
            'nhs_no' => $data->nhs_no,
            'mobile' => $data->mobile,
            'post_code' => $data->post_code,
            'support_plan' => $data->support_plan,
            'address' => $data->address,
            'gp_details' => $data->gp_details,
            'next_of_kin' => $data->next_of_kin,
            ];
        //$data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('backEnd.patients.support_plan', compact('result', 'support_plans'));
  
        return $pdf->download('support_plan.pdf');
    }

    public function full_patients_details($id){

        $data = ErpPatient::where('id','=', $id)->first();
        $support_plans = ErpSupportPlan::all();
        $result = [
            'patient_id' => $data->patient_id,
            'title' => $data->title,
            'first_name' => $data->first_name,
            'middle_name' => $data->last_name,
            'sur_name' => $data->sur_name,
            'behaviour' => $data->behaviour,
            'date_of_birth' => date('Y-m-d', strtotime($data->date_of_birth)),
            'nhs_no' => $data->nhs_no,
            'mobile' => $data->mobile,
            'post_code' => $data->post_code,
            'support_plan' => $data->support_plan,
            'address' => $data->address,
            'gp_details' => $data->gp_details,
            'next_of_kin' => $data->next_of_kin,
            'behaviour' => $data->behaviour,
            'communication' => $data->communication,
            'daily_living_skills' => $data->daily_living_skills,
            'education' => $data->education,
            ];
        //$data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('backEnd.patients.full_patients_details', compact('result', 'support_plans'));
  
        return $pdf->download('full_patients_details.pdf');
    }


    
}
