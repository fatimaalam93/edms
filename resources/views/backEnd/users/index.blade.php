@extends('backEnd.master')
@section('mainContent')
    <div class="row">
        <div class="col-md-12">

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
            @if(session()->has('message-success-assign-user'))
                <div class="alert alert-success mb-3 background-success" role="alert">
                    {{ session()->get('message-success-assign-user') }}
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

           @canany(['View User List','Edit User','Delete User','Assign Permission by User'])
            <div class="card">
                <div class="card-header">
                    <h5>Users</h5>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="basic-btn" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Created By</th>
                                <th>Last Login</th>
                                <th>Last Login IP</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($users))
                                @php $i = 1 @endphp
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @foreach($user->roles as $roles)
                                                @if($roles)
                                                    {{$roles->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @foreach($users as $userCreator)
                                                @if( $user->created_by == $userCreator->id )
                                                    {{$userCreator->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$user->last_login_at}}</td>
                                        <td>{{$user->last_login_ip}}</td>
                                        <td>
                                            <a href="#" title="View">
                                                <button type="button" class="btn btn-success action-icon"><i class="fa fa-eye"></i></button>
                                            </a>
                                            @can('Edit User')
                                            <a href="{{ url('user/'.$user->id.'/edit') }}" title="Edit">
                                                <button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button>
                                            </a>
                                            @endcan
                                            @can('Delete User')
                                            <a class="modalLink" title="Inactive" data-modal-size="modal-md"
                                               href="{{url('deleteUserView', $user->id)}}">
                                                <button type="button" class="btn btn-danger action-icon"><i class="fa fa-trash-o"></i></button>
                                            </a>
                                            @endcan
                                            @can('Assign Permission by User')
                                            <a href="{{url('user_assign-permission', $user->id)}}" title="view">
                                                <button type="button" class="btn btn-success action-icon">Assign Permission</button>
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcanany
        </div>
    </div>

@endSection
