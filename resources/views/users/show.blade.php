@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">USER #{{$user->id}}</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('users.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">

                        <div class="form-group row">
                            <label for="id" class="col-md-auto col-form-label text-md-right"><strong>Id:</strong> {{$user->id}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-auto col-form-label text-md-right"><strong>Name:</strong> {{$user->name}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-auto col-form-label text-md-right"><strong>Last Name:</strong> {{$user->last_name}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="base_price" class="col-md-auto col-form-label text-md-right"><strong>Role:</strong> {{$user->role_id}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="base_cost" class="col-md-auto col-form-label text-md-right"><strong>Email:</strong> {{$user->email}}</label>

                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-auto col-form-label text-md-right"><strong>Status:</strong> {{$user->is_active}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="created_at" class="col-md-auto col-form-label text-md-right"><strong>Created At:</strong> {{$user->created_at}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="updated_at" class="col-md-auto col-form-label text-md-right"><strong>Updated At:</strong> {{$user->updated_at}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="notes" class="col-md-auto col-form-label text-md-right"><strong>Notes:</strong> {{$user->notes}}</label>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
