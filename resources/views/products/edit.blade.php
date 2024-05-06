@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">EDIT PRODUCT</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('products.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('products.update',$product)}}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Fill the requiered fields!</strong> try again...<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{$product->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description:</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="height:150px;" name="description" placeholder="Description...">{{$product->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="base_price" class="col-md-4 col-form-label text-md-right">Base Price:</label>
                            <div class="col-md-6">
                                <input type="text" name="base_price" class="form-control" placeholder="Base Price" value="{{$product->base_price}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="base_cost" class="col-md-4 col-form-label text-md-right">Base Cost:</label>
                            <div class="col-md-6">
                                <input type="text" name="base_cost" class="form-control" placeholder="Base Cost" value="{{$product->base_cost}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Category:</label>
                            <div class="col-md-6">
                                <select name="category_id" class="form-select" id="">
                                    <option value="">-- Elige la categoría --</option>
                                    <option value="1" @selected("1" == $product->category_id)>1</option>
                                    <option value="2" @selected("2" == $product->category_id)>2</option>
                                    <option value="3" @selected("3" == $product->category_id)>3</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-4 col-form-label text-md-right">Status:</label>
                            <div class="col-md-6">
                                <select name="is_active" class="form-select" id="">
                                    <option value="">-- Elige el status --</option>
                                    <option value="1" @selected("1" == $product->is_active)>Activo</option>
                                    <option value="0" @selected("1" == $product->is_active)>Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

