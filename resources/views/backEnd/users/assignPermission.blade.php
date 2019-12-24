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

    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'user_permission_store', 'method' => 'POST']) }}
    <input type="hidden" name="user_id" value="{{$user->id}}">

    <div class="card">
        <div class="card-header">
            <h5>Assign Permission To - {{$user->name}} </h5>
        </div>
        <div class="card-block">
            <table class="table">
                <thead>
                <tr style="border-top: none !important;">
                    <th>Features</th>
                    <th>Permission</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name}}</td>
                        <td>
                            <div class="">
                                <input type="checkbox" id="permissions{{$permission->id}}" class="common-checkbox" name="permissions[]" value="{{$permission->id}}" {{in_array($permission->id, $already_assigned)? 'checked':''}}>
                                <label for="permissions{{$permission->id}}"></label>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>
                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn fix-gr-bg">
                                <span class="ti-check"></span>
                                Save
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{ Form::close() }}
@endSection
