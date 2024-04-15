@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Products</h1>
        <a href="{{route('products.create')}}" class="linkButton"><button class="button">NEW PRODUCT</button></a>
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

                    <tr>
                        <th>{{$product->id}}</th>
                        <th class="fw-bold" >{{$product->name}}</th>
                        <th>{{$product->description}}</th>
                        <th>{{$product->base_price}}</th>
                        <th>{{$product->base_cost}}</th>
                        <th>{{$product->category_id}}</th>
                        <th>
                            @if ($product->is_active)
                                <span class="badge bg-success fs-6">Activo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inactivo</span>
                            @endif
                        </th>
                        <th>{{$product->created_at}}</th>
                        <th>
                            <a href="{{route('products.edit', $product)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('products.destroy', $product)}}" method="POST" class="d-inline">
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
        {{$products->links()}}
    </div>
@endsection
