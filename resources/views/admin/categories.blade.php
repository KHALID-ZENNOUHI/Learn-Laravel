
@extends('layout.app')

@section('title', 'Categories')

@section('content')
<!-- MAIN CONTENT-->
            <div class="main-content">
            <div class="row m-t-5 m-l-30 m-r-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class = "table-data__tool">
                                <h3 class="title-5 m-b-35">Data Categories</h3>
                                <a href="#addCategorie" class="" data-toggle="modal"><i class="zmdi zmdi-plus"></i><span>Add New Categories</span></a>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Categories</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $categorie)
                                                <tr>
                                                    <td>{{$categorie->name}}</td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                        <a href="#editCategorie{{$categorie->id}}" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <form action="{{ route('categories.deletecategorie',$categorie->id) }}" method = "POST">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i></a>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <!-- Edit Modal HTML -->
                                                <div id="editCategorie{{$categorie->id}}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method = "POST" action = "{{ route('categories.updatecategorie',$categorie->id) }}" >
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" value = "{{$categorie->id}}" name ="id">
                                                                <div class="modal-header">						
                                                                    <h4 class="modal-title">Edit Categorie</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Categorie:</label>
                                                                        <input type="text" value = "{{$categorie->name}}" name = "categorie" class="form-control" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                        <input type="submit" name = "" class="btn btn-success" value="Edit">
                                                                    </div>
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
<div id="addCategorie" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('categories.addcategorie')}}">
            @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Categorie</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Categorie:</label>
                        <input type="text" name="categorie" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
