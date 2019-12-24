@extends('backEnd.master')

@section('mainContent')

@if(session()->has('message-success'))
<div class="alert alert-success mb-3 background-success" role="alert">
    {{ session()->get('message-success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(session()->has('message-danger'))
<div class="alert alert-danger">
    {{ session()->get('message-danger') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session()->has('message-success-delete'))
<div class="alert alert-danger mb-3 background-danger" role="alert">
    {{ session()->get('message-success-delete') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(session()->has('message-danger-delete'))
<div class="alert alert-danger">
    {{ session()->get('message-danger-delete') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="card">
    <div class="card-header">
        <h5>{{ ucfirst($patient->first_name) }} {{ ucfirst($patient->last_name) }} {{ ucfirst($patient->sur_name) }}'s Documents</h5>
        @can('Add documents')
        <a href="{{ url('document/create/'.$patient->id) }}" style="float: right; padding: 8px;" class="btn btn-success">  Add Document </a>
        @endcan
    </div>
        <!-- <div class="row p-3">
            <h5 class="col" style="font-size: 1.1em">{{ ucfirst($patient->first_name) }} {{ ucfirst($patient->last_name) }} {{ ucfirst($patient->sur_name) }}</h5>
            <h5 class="col" style="font-size: 1.1em">Gender: {{ ucfirst($patient->gender) }}</h5>
            <h5 class="col" style="font-size: 1.1em">Born: {{date('d-M-Y', strtotime($patient->date_of_birth))}}</h5>
            <h5 class="col" style="font-size: 1.1em">Patient ID: {{$patient->patient_id}}</h5>
        </div>
        <div class="row p-3">
            <h5 class="col" style="font-size: 1.1em">{{ ucfirst($patient->address) }}</h5>
            <h4 class="col"></h4>
            <h4 class="col"></h4>
            <h5 class="col" style="font-size: 1.1em">NHS Number: {{$patient->nhs_no}}</h5>
        </div> -->
        <div>
            <div class="row m-1">
               <div class="col-md-3"> 
                    <h6>Document Type</h6>
                    <input type="search" class="form-control" name="">
                </div>
                <div class="col-md-3"> 
                    <h6>Speciality</h6>
                    <input type="search" class="form-control" name="">
                </div>
                <div class="col-md-3"> 
                    <h6>Consultant</h6>
                    <input type="search" class="form-control" name="">
                </div>
                <div class="col-md-3"> 
                    <h6>Document Date</h6>
                    <input type="search" class="form-control datepicker" name="">
                </div>
            </div>
            <a href="#" class="btn btn-info" style="float: right; padding: 6px 20px; margin: 20px;"> Search </a>
        </div>
        <!-- <a href="{{ url('document/create/'.$patient->id) }}" style="float: right; padding: 8px;" class="btn btn-success"> Add Document </a> -->
    <!-- </div> -->
    @can('View documents')
    <div class="card-block">
        
        <div class="table table-responsive">
        <table id="basic-btn" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>Doc Code </th>
                    <th>Name</th>
                    <th>Doc Type</th>
                    <th>Date</th>
                    <th>Speciality</th>
                    <th>Consultant</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach($documents as $doc)
                @if($doc->active_status == 1)
                <tr>
                    <!-- <div class="menu" hidden="true">
                      <ul class="menu-options">
                        <li class="menu-option">Back</li>
                        <li class="menu-option">Reload</li>
                        <li class="menu-option">Save</li>
                        <li class="menu-option">Save As</li>
                        <li class="menu-option">Inspect</li>
                      </ul>
                    </div> -->

                    <td>{{$doc->document_type_code}}</td>
                    <td>{{$doc->document_name}}</td>
                    <td>{{$doc->doc_type}}</td>
                    <td>{{date('d-M-Y', strtotime($doc->created_at))}}</td>
                    <td>{{$doc->speciality}}</td>
                    <td>{{$doc->consultant}}</td>
                    <td>
                        <!-- <iframe src="https://docs.google.com/gview?url=http://localhost/dms/document/{{$doc->id}}&embedded=true"></iframe> -->

                        <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://remote.url.tld/path/to/document.doc' width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> -->

    <a href="#myModal" data-toggle="modal" data-target="#myModal_{{ $doc->id}}" title="Properties">
        <button type="button" class="btn btn-success action-icon"><i class="fa fa-eye"></i></button>
    </a>

    <!-- Document Details Model -->
     <div class="modal fade" id="myModal_{{ $doc->id}}" role="dialog" >
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    @if( isset($doc->document_name) )
                        <h4 class="modal-title" style="color:#000000">{{$doc->document_name}}</h4>
                    @endif
                </div>
                <div class="modal-body" >
                    <div class="table-responsive">
                        <table class="table m-0">
                            <tbody>
                                <tr>
                                    <th scope="col">Document Code</th>
                                    <td>{{$doc->document_type_code}}</td>

                                    <th scope="row">Document Type</th>
                                    <td>{{$doc->doc_type}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Upload Date</th>
                                    <td>{{ date('d-M-Y', strtotime($doc->created_at)) }}</td>

                                    <th scope="row">Version No.</th>
                                    <td>{{$doc->version_no}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Speciality</th>
                                    <td>{{$doc->speciality}}</td>

                                    <th scope="row">Consultant</th>
                                    <td>{{$doc->consultant}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Owner</th>
                                    <td>{{$doc->owner}}</td>

                                    <th scope="row">Access Control List</th>
                                    <td>{{$doc->acl}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
                        @can('Edit documents')
                        <a href="{{url('document/edit/'.$doc->id)}}" title="Edit"><button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button></a>
                        @endcan

                        <!-- <a href="{{url('document/'.$doc->id)}}" target="_blank"><button type="button" class="btn btn-sm" style="background-color: lightgrey; font-size: 1.05em;">Read File</button></a> -->

                        <a href="{{url('document/'.$doc->id)}}" title="Open"><button type="button" class="btn btn-basic action-icon"><i class="ti ti-file"></i></button></a>

                        <a href="{{url('generatePDF/'.$doc->id)}}" title="Export"><button type="button" class="btn btn-primary action-icon"><i class="ti ti-export"></i></button></a>

                        @role('Adminstrator')
                        <a class="modalLink" title="Delete" data-modal-size="modal-md" href="{{url('deleteDocumentView', $doc->id)}}"><button type="button" class="btn btn-danger action-icon"><i class="fa fa-trash-o"></i></button>
                        @endrole

                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @endcan
</div>
@endSection
