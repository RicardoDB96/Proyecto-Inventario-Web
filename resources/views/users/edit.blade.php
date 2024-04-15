@extends('layouts.base')

@section('content')


<div class="place">
    <h1>Editar User</h1>

</div>
<div class="place">
    <a href="{{route('users.index')}}" class="linkButton"><button class="button">VOLVER</button></a>
</div>


<div >

    <form action="{{route('users.update', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div >

            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="User Name"  value="{{$user->name}}" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"  value="{{$user->last_name}}">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-4 mt-1">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select name="role_id" class="form-select" id="">
                        <option value="">-- Elige el Role --</option>
                        <option value="1" @selected("1" == $user->role_id)>Admin</option>
                        <option value="2" @selected("2" == $user->role_id)>Special</option>
                        <option value="3" @selected("3" == $user->role_id)>User</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Email:</strong>
                    <textarea class="form-control" style="height:150px" name="email" placeholder="Email...">{{$user->email}}"</textarea>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="text" name="password" class="form-control" placeholder="Password"  value="{{$user->password}}" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-4 mt-1">
                <div class="form-group">
                    <strong>Status:</strong>
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




