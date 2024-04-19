@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">CATEGORY #{{$category->id}}</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('categories.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">

                        <div class="form-group row">
                            <label for="id" class="col-md-auto col-form-label text-md-right"><strong>Id:</strong> {{$category->id}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-auto col-form-label text-md-right"><strong>Name:</strong> {{$category->name}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-auto col-form-label text-md-right"><strong>Status:</strong> {{$category->is_active}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="created_at" class="col-md-auto col-form-label text-md-right"><strong>Created At:</strong> {{$category->created_at}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="updated_at" class="col-md-auto col-form-label text-md-right"><strong>Updated At:</strong> {{$category->updated_at}}</label>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
