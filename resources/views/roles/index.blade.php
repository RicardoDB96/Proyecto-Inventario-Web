@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Roles</h2>
        </div>
        <div>
            <a href="{{route('roles.create')}}" class="btn btn-primary">Crear rol</a>
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
                    <th>Id</th>
                    <th>Role Name</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)

                    <tr>
                        <th>{{$role->id}}</th>
                        <th class="fw-bold" >{{$role->name}}</th>
                        <th>
                            @if ($role->is_active)
                                <span class="badge bg-success fs-6">Activo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inactivo</span>
                            @endif
                        </th>
                        <th>{{$role->created_at}}</th>
                        <th>
                            <a href="{{route('roles.edit', $role)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('roles.destroy', $role)}}" method="POST" class="d-inline">
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
        {{$roles->links()}}
    </div>
</div>
@endsection