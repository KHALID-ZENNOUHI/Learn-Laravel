
@extends('layout.app')

@section('title', 'Products')

@section('content')
<!-- MAIN CONTENT-->
            <div class="main-content">
            <div class="row m-t-5 m-l-30 m-r-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class = "table-data__tool">
                                <h3 class="title-5 m-b-35">Data Products</h3>
                                <a href="#addproduct" class="" data-toggle="modal"><i class="zmdi zmdi-plus"></i><span>Add New Products</span></a>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Categorie</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach($products as $product)
                                        <tbody>
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->description}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->productCategorie}}</td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                        <a href="#editproduct{{$product->id}}" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <form action="{{route('products.delete', $product->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <!-- Edit Modal HTML -->
                                                <div id="editproduct{{$product->id}}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{route('products.edit', $product->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value = "{{$product->id}}" name ="id">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">edit Product</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Product:</label>
                                                                    <input type="text" value="{{$product->name}}" name="product" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description:</label>
                                                                    <textarea name="description" class="form-control" id="" cols="10" rows="10">{{$product->description}}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Price:</label>
                                                                    <input type="number" value="{{$product->price}}" name="price" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Categorie:</label>
                                                                    <select name="categorie" id="" class="form-control">
                                                                        @foreach($categories as $categorie)
                                                                        <option value="{{$categorie->id}}" {{($categorie->name === $product->productCategorie) ? 'selected' : ''}}>{{$categorie->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Image:</label>
                                                                    <input type="file" name="image"  class="form-control" accept="image/*">
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
<div id="addproduct" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('products.add')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product:</label>
                        <input type="text" name="product" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control" id="" cols="10" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <select name="categorie" id="" class="form-control">
                            <option value="" selected>choose a categorie</option>
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
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
