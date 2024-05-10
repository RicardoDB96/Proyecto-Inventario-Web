@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Suppliers</h1>
    <div class="button-group">
    @if (Auth::check() && Auth::user()->hasRole('Admin'))
        <a href="{{ route('suppliers.create') }}" class="linkButton"><button class="button" id="buttonPlace">New Supplier</button></a>
        @endif
        <a href="{{ route('supplier.logs') }}" class="linkButton"><button class="button" id="buttonPlace">See Logs</button></a>
    </div>
</div>
<div class="place" id="placeCel1">
    <div class="button-group">
        <a href="{{ route('suppliers.create') }}" class="linkButton"><button class="button">New Supplier</button></a>
        <a href="{{ route('supplier.logs') }}" class="linkButton"><button class="button">See Logs</button></a>
    </div>
</div>
<div class="place d-flex column flex-wrap align-items-end ">
    <div class="searchBox form-group">
        <form method="GET" action="{{route('supplier.search')}}" class="d-flex">
            <input class="form-control" name="query"  placeholder="Search..." >
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class=" form-group mt-3" id="categoriasPlace">
        <form method="GET" action="/supplier/filter" class="d-flex column flex-wrap justify-content-center">
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
                <a href="{{ route('suppliers.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
            </div>
        </form>
    </div>

</div>

<div class="place" id="placeCel2">
    <div class="form-group">
        <form method="GET" action="/supplier/filter" class="d-flex row flex-wrap justify-content-center">
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
                <a href="{{ route('suppliers.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
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
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    @if (Auth::check() && Auth::user()->hasRole('Admin'))
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $supplier)

                    <tr>
                        <th>{{$supplier->id}}</th>
                        <th class="fw-bold" ><a href="{{route('suppliers.show', $supplier)}}">{{$supplier->name}}</a></th>
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
                        @if (Auth::check() && Auth::user()->hasRole('Admin'))
                        <th>
                            <a href="{{route('suppliers.edit', $supplier)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('suppliers.destroy', $supplier)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </th>
                        @endif
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
