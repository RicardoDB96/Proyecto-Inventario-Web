@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Products</h1>
    <div class="button-group" id="contenedorBoton">
    @if (Auth::check() && Auth::user()->hasRole('Admin'))
        <a href="{{ route('products.create') }}" class="linkButton"><button class="button" id="buttonPlace">New Product</button></a>
        @endif
    </div>
</div>
<div class="place" id="placeCel1">
    <div class="button-group">
        <a href="{{ route('products.create') }}" class="linkButton"><button class="button">New Products</button></a>
    </div>
</div>

<div class="place d-flex column flex-wrap align-items-end ">
    <div class="searchBox form-group">
        <form method="GET" action="{{route('product.search')}}" class="d-flex">
            <input class="form-control" name="query"  placeholder="Search..." >
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class=" form-group mt-3" id="categoriasPlace">
        <form method="GET" action="/product/filter" class="d-flex column flex-wrap justify-content-center">
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
                <a href="{{ route('products.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
            </div>
        </form>
    </div>

</div>

<div class="place" id="placeCel2">
    <div class="form-group">
        <form method="GET" action="/product/filter" class="d-flex row flex-wrap justify-content-center">
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
                <a href="{{ route('products.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
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
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Base Price</th>
                    <th>Base Cost</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    @if (Auth::check() && Auth::user()->hasRole('Admin'))
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)

                    <tr class="data">
                        <th>{{$product->id}}</th>
                        <th class="fw-bold" ><a href="{{route('products.show', $product)}}">{{$product->name}}</a></th>
                        <th class="setWidth concat"><div class="desc">{{$product->description}}</div></th>
                        <th>{{$product->base_price}}</th>
                        <th>{{$product->base_cost}}</th>
                        <th>{{$product->category->name}}</th>
                        <th>
                            @if ($product->is_active)
                                <span class="badge bg-success fs-6">Activo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inactivo</span>
                            @endif
                        </th>
                        <th>{{$product->created_at}}</th>
                        @if (Auth::check() && Auth::user()->hasRole('Admin'))
                        <th>
                            <div class="d-flex column flex-wrap gap-2">
                                <a href="{{route('products.edit', $product)}}" class="btn btn-warning">Editar</a>

                                <form action="{{route('products.destroy', $product)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
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
        {{$products->links()}}
    </div>
@endsection
