@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Users</h1>
        <a href="{{route('users.create')}}" class="linkButton"><button class="button">NEW USER</button></a>
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

    <div class="tableInfo">
        <table class="table table-bordered text-black table-striped table-hover">
            <thead class="thead">
                <tr class="text-black">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)

                    <tr>
                        <th>{{$user->id}}</th>
                        <th class="fw-bold" ><a href="{{route('users.show', $user)}}">{{$user->name}}</a></th>
                        <th>{{$user->last_name}}</th>
                        <th>{{$user->role->name}}</th>
                        <th>{{$user->email}}</th>
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
        {{$users->links()}}
    </div>
@endsection
