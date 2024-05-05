@extends('layouts.base')

@section('content')

<div class="place">
    <h1>Inventories</h1>
    <a href="{{route('inventories.create')}}" class="linkButton"><button class="button" id="buttonPlace">NEW INVENTORY</button></a>
</div>
<div class="place" id="placeCel1">
    <a href="{{route('inventories.create')}}" class="linkButton"><button class="button">NEW INVENTORY</button></a>
</div>
<div class="place" id="placeCel2">
    <select name="categorias">
        <option value="">-- Buscar por: --</option>
        <option value="1">Nombre</option>
        <option value="2">Fecha</option>
        <option value="3">Cantidad</option>
    </select>
</div>
<div class="place">
    <div class="searchBox">
        <input type="text" name="base_cost"  placeholder="Barra de busqueda..." >
    </div>

    <select name="categorias" id="categoriasPlace">
        <option value="">-- Buscar por: --</option>
        <option value="1">Nombre</option>
        <option value="2">Fecha</option>
        <option value="3">Cantidad</option>
    </select>
</div>

@if (Session::get('success'))
        <div class="alert alert-success">
            <strong>{{Session::get('success')}}</strong>
        </div>
@endif

<div class="tableInfo table-responsive">
    <table class="table table-bordered text">
        <thead class="thead">
            <tr class="text-black">
                <th>Id</th>
                <th>Amount</th>
                <th>Product Id</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inventories as $inventory)

                <tr>
                    <th>{{$inventory->id}}</th>
                    <th class="fw-bold" >{{$inventory->amount}}</th>
                    <th>{{$inventory->product_id}}</th>
                    <th>
                        @if ($inventory->is_active)
                            <span class="badge bg-success fs-6">Activo</span>
                        @else
                            <span class="badge bg-secondary fs-6">Inactivo</span>
                        @endif
                    </th>
                    <th>{{$inventory->created_at}}</th>
                    <th>
                        <a href="{{route('inventories.edit', $inventory)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('inventories.destroy', $inventory)}}" method="POST" class="d-inline">
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
    {{$inventories->links()}}
</div>
@endsection
