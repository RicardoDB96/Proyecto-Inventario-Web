@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Producto</h2>
        </div>
        <div>
            <a href="{{route('products.create')}}" class="btn btn-primary">Crear product</a>
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
</div>
@endsection
