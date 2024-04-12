@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Inventories</h2>
        </div>
        <div>
            <a href="{{route('inventories.create')}}" class="btn btn-primary">Crear Inventory</a>
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
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inventories as $inventory)

                    <tr>
                        <th>{{$inventory->id}}</th>
                        <th class="fw-bold" >{{$inventory->product_id}}</th>
                        <th>{{$inventory->amount}}</th>
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
</div>
@endsection
