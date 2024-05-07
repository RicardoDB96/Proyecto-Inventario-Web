@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Bitacories</h1>
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
                <tr>
                    <th>Movement type</th>
                    <th>Product Name</th>
                    <th>Initial inventory</th>
                    <th>Delta inventory</th>
                    <th>Final inventory</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inventory_logs as $inventory_log)
                    <tr class="data">
                        <th>
                            @if ($inventory_log->entity_id === 1)
                                <span class="badge bg-success fs-6">Compra</span>
                            @else
                                <span class="badge bg-secondary fs-6">Venta</span>
                            @endif
                        </th>
                        <th><a href="{{route('products.show', $inventory_log->product->id)}}">{{$inventory_log->product->name}}</a></th>
                        <th>{{$inventory_log->initial_inventory}}</th>
                        <th>{{$inventory_log->delta_inventory}}</th>
                        <th>{{$inventory_log->final_inventory}}</th>
                        <th>{{$inventory_log->creation_date}}</th>
                    </tr>

                @empty
                    <tr>
                        <th>None</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{$inventory_logs->links()}}
    </div>
@endsection
