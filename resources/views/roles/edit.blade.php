@extends('layouts.base')

@section('content')

<div class="place">
    <h1>Editar Role</h1>

</div>
<div class="place">
    <a href="{{route('roles.index')}}" class="linkButton"><button class="button">VOLVER</button></a>
</div>


<div>

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('roles.update', $role)}}" method="POST">
        @csrf
        @method('PUT')
        <div>

            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Role Name" value="{{$role->name}}" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-4 mt-1">
                <div class="form-group">
                    <strong>Status:</strong>
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
@endsection
