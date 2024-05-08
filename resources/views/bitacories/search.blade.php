@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Bitacories</h1>
    <div class="button-group">
        <a href="{{ route('bitacories.index') }}" class="linkButton"><button class="button" id="buttonPlace">Back</button></a>
    </div>
</div>
<div class="place" id="placeCel1">
    <div class="button-group">
        <a href="{{ route('bitacories.index') }}" class="linkButton"><button class="button">Back</button></a>
    </div>
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
    <div class="searchBox form-group">
        <form method="GET" action="{{route('bitacory.search')}}" class="d-flex">
            <input class="form-control" name="query"  placeholder="Search..." >
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
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
                        <th>{{$inventory_log->product->name}}</a></th>
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
