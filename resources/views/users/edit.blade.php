@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Usuario</h2>
        </div>
        <div>
            <a href="{{route('users.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <strong>Error</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('users.update', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{$user->name}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Apellidos" value="{{$user->last_name}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Rol:</strong>
                    <select name="role_id" class="form-select" id="">
                        <option value="">-- Elige el rol --</option>
                        <option value="1" @selected("1" == $user->role_id)>1</option>
                        <option value="2" @selected("2" == $user->role_id)>2</option>
                        <option value="3" @selected("3" == $user->role_id)>3</option>
                    </select>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
