
@extends('layout.app')

@section('title', 'Users')

@section('content')
<!-- MAIN CONTENT-->
            <div class="main-content">
            <div class="row m-t-5 m-l-30 m-r-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class = "table-data__tool">
                                <h3 class="title-5 m-b-35">Data Permission</h3>
                                <a href="#addpermission" class="" data-toggle="modal"><i class="zmdi zmdi-plus"></i><span>Add New Permission</span></a>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table id="myTable" class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Role</th>
                                                <th>Permission</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)

                                            <tr>
                                                    <td>{{$role->name}}</td>
                                                    <td>
                                                        <ul>
                                                        @foreach ($role->permissions as $permission)
                                                            <li>
                                                                {{$permission->route->name}}
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                        <a href="#editpermission{{$role->id}}" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <form action="{{route('permissions.delete',$role->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    </td>
                                                <!-- Edit Modal HTML -->
                                                <div id="editpermission{{$role->id}}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('permissions.update', ['id' => $role->id]) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value = "{{$role->id}}" name ="id">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">edit Permission</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Role:</label>
                                                                    <input type="text" value="{{$role->name}}" name="name" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Permissions:</label>
                                                                    <select name="route_id[]" id="tag" class="form-control">
                                                                        @foreach ($routes as $route)
                                                                        <option value="{{$route->id}}">{{$route->name}}</option>
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
                                            @endforeach
                                        </tbody>
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
<div id="addpermission" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('permissions.add')}}">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Permission</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Role:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <select name="route_id[]" id="addtag" class="form-control">
                            <label>Permission:</label>
                            {{-- <option value="" selected>choose a role</option> --}}
                            @foreach ($routes as $route)
                                <option value="{{$route->id}}">{{$route->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
    <script>
        var settings = {};
        new TomSelect('#addtag', {
            plugins: ['remove_button'],
            persist: false,
            create: false,
            maxItems: 100,
        });
    </script>
</div>
<script>
    var settings = {};
    new TomSelect('#tag', {
        plugins: ['remove_button'],
        persist: false,
        create: false,
        maxItems: 100,
    });
</script>
@endsection
