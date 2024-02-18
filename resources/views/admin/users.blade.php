
@extends('layout.app')

@section('title', 'Users')

@section('content')
<!-- MAIN CONTENT-->
            <div class="main-content">
            <div class="row m-t-5 m-l-30 m-r-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class = "table-data__tool">
                                <h3 class="title-5 m-b-35">Data Users</h3>
                                <a href="#adduser" class="" data-toggle="modal"><i class="zmdi zmdi-plus"></i><span>Add New user</span></a>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table id="myTable" class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach($users as $user)
                                        <tbody>
                                                <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->role->name}}</td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                        <a href="#edituser{{$user->id}}" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <!-- Edit Modal HTML -->
                                                <div id="edituser{{$user->id}}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value = "{{$user->id}}" name ="id">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">edit User</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>User:</label>
                                                                    <input type="text" value="{{$user->name}}" name="name" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input type="email" value="{{$user->email}}" name="email" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Role:</label>
                                                                    <select name="role_id" id="" class="form-control">
                                                                        @foreach($roles as $role)
                                                                        <option value="{{$role->id}}" {{($role->name === $user->role->name) ? 'selected' : ''}}>{{$role->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                <input type="submit" name="" class="btn btn-success" value="Edit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                                </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                    <!-- END DATA TABLE-->
            </div>
            <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>                                        
    </div>
<!-- Add Modal  -->
<div id="adduser" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('users.add')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>User:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="" class="form-control">
                            <option value="" selected>choose a role</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
