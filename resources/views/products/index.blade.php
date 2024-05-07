@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Products</h1>
        <a href="{{route('products.create')}}" class="linkButton"><button class="button" id="buttonPlace">New Product</button></a>
    </div>
    <div class="place" id="placeCel1">
        <a href="{{route('products.create')}}" class="linkButton"><button class="button">New Product</button></a>
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
            <form method="GET" action="{{route('products.search')}}" class="d-flex">
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
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Base Price</th>
                    <th>Base Cost</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
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
