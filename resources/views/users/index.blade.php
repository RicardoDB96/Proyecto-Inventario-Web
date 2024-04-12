@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Usuarios</h2>
        </div>
        <div>
            <a href="{{route('users.create')}}" class="btn btn-primary">Crear nuevo usuario</a>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-4">
            <strong>{{Session::get('success')}}</strong>
        </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <thead>
                <tr class="text-secondary">
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo electrónico</th>
                    <th>Rol</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)

                    <tr>
                        <th>{{$user->id}}</th>
                        <th class="fw-bold" >{{$user->name}}</th>
                        <th>{{$user->last_name}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->role_id}}</th>
                        <th>
                            @if ($user->is_active)
                                <span class="badge bg-success fs-6">Activo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inactivo</span>
                            @endif
                        </th>
                        <th>{{$user->created_at}}</th>
                        <th>
                            <a href="{{route('users.edit', $user)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('users.destroy', $user)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </th>
                    </tr>

                @empty
                    <tr>
                        <th>None</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection
