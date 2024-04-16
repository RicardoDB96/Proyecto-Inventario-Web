@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Editar User</h1>

</div>
<div class="place">
    <a href="{{ route('users.index') }}" class="linkButton"><button class="button">VOLVER</button></a>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-start">
                    <h4 class="mb-0">EDIT USER</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('users.update', $user)}}" method="POST">
                     @csrf
                    @method('PUT')
        <div >
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                        <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="User Name"  value="{{$user->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$user->last_name}}">
                        </div>
                    </div>

                            <div class="form-group row">
                                        <label for="role_id" class="col-md-4 col-form-label text-md-right">Role:</label>
                                        <div class="col-md-6">
                                        <select name="role_id" class="form-select" id="">
                                <option value="">-- Elige el Role --</option>
                                <option value="1" @selected("1" == $user->role_id)>Admin</option>
                                <option value="2" @selected("2" == $user->role_id)>Special</option>
                                <option value="3" @selected("3" == $user->role_id)>User</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                        <div class="col-md-6">
                            <input type="text" name="email" class="form-control" placeholder="Email..." value="{{$user->email}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>
                        <div class="col-md-6">
                            <input type="text" name="password" class="form-control" placeholder="Password..." value="{{$user->password}}">
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="is_active" class="col-md-4 col-form-label text-md-right">Status:</label>
                            <div class="col-md-6">
                                <select name="is_active" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="1" @selected("1" == $user->is_active)>Activo</option>
                        <option value="0" @selected("0" == $user->is_active)>Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 text-center mt-1">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection