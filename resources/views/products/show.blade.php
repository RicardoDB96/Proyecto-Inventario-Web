@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">PRODUCT #{{$product->id}}</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('products.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">

                        <div class="form-group row">
                            <label for="id" class="col-md-auto col-form-label text-md-right"><strong>Id:</strong> {{$product->id}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-auto col-form-label text-md-right"><strong>Name:</strong> {{$product->name}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-auto col-form-label text-md-right"><strong>Description:</strong> {{$product->description}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="base_price" class="col-md-auto col-form-label text-md-right"><strong>Base Price:</strong> {{$product->base_price}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="base_cost" class="col-md-auto col-form-label text-md-right"><strong>Base Cost::</strong> {{$product->base_cost}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-auto col-form-label text-md-right"><strong>Category:</strong> {{$product->category_id}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-auto col-form-label text-md-right"><strong>Status:</strong> {{$product->is_active}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="created_at" class="col-md-auto col-form-label text-md-right"><strong>Created At:</strong> {{$product->created_at}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="updated_at" class="col-md-auto col-form-label text-md-right"><strong>Updated At:</strong> {{$product->updated_at}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="notes" class="col-md-auto col-form-label text-md-right"><strong>Notes:</strong> {{$product->notes}}</label>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
