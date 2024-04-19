@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Categories</h1>
        <a href="{{route('categories.create')}}" class="linkButton"><button class="button">NEW CATEGORY</button></a>
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
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)

                    <tr>
                        <th>{{$category->id}}</th>
                        <th class="fw-bold" ><a href="{{route('categories.show', $category)}}">{{$category->name}}</a></th>
                        <th>
                            @if ($category->is_active)
                                <span class="badge bg-success fs-6">Activo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inactivo</span>
                            @endif
                        </th>
                        <th>{{$category->created_at}}</th>
                        <th>
                            <a href="{{route('categories.edit', $category)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('categories.destroy', $category)}}" method="POST" class="d-inline">
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
        {{$categories->links()}}
    </div>
@endsection
