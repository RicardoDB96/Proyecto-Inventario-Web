@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Bitacories</h1>
    <div class="button-group">

    </div>
</div>
<div class="place" id="placeCel1">
    <div class="button-group">

    </div>
</div>
<div class="place d-flex column flex-wrap align-items-end ">
    <div class="searchBox form-group">
        <form method="GET" action="{{route('bitacory.search')}}" class="d-flex">
            <input class="form-control" name="query"  placeholder="Search..." >
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class=" form-group mt-3" id="categoriasPlace">
        <form method="GET" action="/bitacory/filter" class="d-flex column flex-wrap justify-content-center">
            <div>
                <label>Start Date: </label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div>
                <label>End Date: </label>
                <input type="date" name="end_date" class="form-control">
            </div>

            <div class="d-flex align-items-end ">
                <button type="submit" class="btn btn-primary py-3 px-3">Filter</button>
                <a href="{{ route('bitacories.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
            </div>
        </form>
    </div>

</div>

<div class="place" id="placeCel2">
    <div class="form-group">
        <form method="GET" action="/bitacory/filter" class="d-flex row flex-wrap justify-content-center">
            <div class="mb-3">
                <label>Start Date: </label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="mb-3">
                <label>End Date: </label>
                <input type="date" name="end_date" class="form-control">
            </div>

            <div class="d-flex align-items-end justify-content-center mb-3">
                <button type="submit" class="btn btn-primary py-3 px-3 ">Filter</button>
                <a href="{{ route('bitacories.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
            </div>
        </form>
    </div>
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
                        <th>{{$inventory_log->inventory->product->name}}</a></th>
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
