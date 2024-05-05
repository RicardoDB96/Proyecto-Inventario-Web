@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">EDIT ROLE</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('roles.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role) }}" method="POST">
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
                                <input type="text" name="name" class="form-control" placeholder="Role Name" value="{{$role->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-4 col-form-label text-md-right">Status:</label>
                            <div class="col-md-6">
                                <select name="is_active" class="form-select" id="">
                                    <option value="">-- Elige el status --</option>
                                    <option value="1" @selected("1" == $role->is_active)>Activo</option>
                                    <option value="0" @selected("0" == $role->is_active)>Inactivo</option>
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
