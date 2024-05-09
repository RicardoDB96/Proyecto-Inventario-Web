@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">EDIT USER</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('users.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('users.update', $user)}}" method="POST">
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
                                    @foreach(\App\Models\Role::all() as $role)
                                        <option value="{{ $role->id }}"  @selected($role->id == $user->role_id)>{{ $role->name }}</option>
                                    @endforeach
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
