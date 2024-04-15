@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Suppliers</h1>
        <a href="{{route('suppliers.create')}}" class="linkButton"><button class="button">NEW SUPPLIER</button></a>
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
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $supplier)

                    <tr>
                        <th>{{$supplier->id}}</th>
                        <th class="fw-bold" >{{$supplier->name}}</th>
                        <th>{{$supplier->address}}</th>
                        <th>{{$supplier->contact_phone}}</th>
                        <th>
                            @if ($supplier->is_active)
                                <span class="badge bg-success fs-6">Activo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inactivo</span>
                            @endif
                        </th>
                        <th>{{$supplier->created_at}}</th>
                        <th>
                            <a href="{{route('suppliers.edit', $supplier)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('suppliers.destroy', $supplier)}}" method="POST" class="d-inline">
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
        {{$suppliers->links()}}
    </div>
@endsection
