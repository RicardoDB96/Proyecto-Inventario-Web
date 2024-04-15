@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Roles</h1>
        <a href="{{route('roles.create')}}" class="linkButton"><button class="button">NEW ROLE</button></a>
    </div>
    <div class="place">
        <div class="searchBox">
            <input type="text" name="base_cost"  placeholder="Barra de busqueda..." >
        </div>

        <select name="categorias">
            <option value="">-- Buscar por: --</option>
            <option value="1">Nombre</option>
            <option value="2">Fecha</option>
            <option value="3">Cantidad</option>
        </select>
    </div>

    <div>
        <table class="table table-bordered text-black">
            <thead>
                <tr class="text-secondary">
                    <th>Id</th>
                    <th>Name</th>
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
@endsection