@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Editar Rol</h1>
</div>

<div class="place">
    <a href="{{ route('roles.index') }}" class="linkButton"><button class="button">VOLVER</button></a>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-start">
                    <h4 class="mb-0">EDIT ROLE</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role) }}" method="POST">
                     @csrf
                    @method('PUT')
        <div >
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
                </div>
            </form>
        </div>
    </form>
</div>
@endsection