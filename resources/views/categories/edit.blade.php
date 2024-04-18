@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">EDIT CATEGORY</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('categories.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('categories.update',$category)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{$category->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-4 col-form-label text-md-right">Status:</label>
                            <div class="col-md-6">
                                <select name="is_active" class="form-select" id="">
                                <option value="">-- Elige el status --</option>
                                <option value="1" @selected("1" == $category->is_active)>Activo</option>
                                <option value="0" @selected("0" == $category->is_active)>Inactivo</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-xs-10 col-sm-10 col-md-10 text-center mt-1">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
