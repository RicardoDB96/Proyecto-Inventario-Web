@extends('layouts.base')

@section('content')

<div class="place">
    <h1>Editar Producto</h1>

</div>
<div class="place">
    <a href="{{route('products.index')}}" class="linkButton"><button class="button">VOLVER</button></a>
</div>


<div>

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('products.update', $product)}}" method="POST">
        @csrf
        @method('PUT')
        <div>

            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{$product->name}}" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description...">{{$product->description}}</textarea>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Base Price:</strong>
                    <input type="text" name="base_price" class="form-control" placeholder="Base Price" value="{{$product->base_price}}" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Base Cost:</strong>
                    <input type="text" name="base_cost" class="form-control" placeholder="Base Cost" value="{{$product->base_cost}}" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-4 mt-1">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select name="category_id" class="form-select" id="">
                        <option value="">-- Elige la categoría --</option>
                        <option value="1" @selected("1" == $product->category_id)>1</option>
                        <option value="2" @selected("2" == $product->category_id)>2</option>
                        <option value="3" @selected("3" == $product->category_id)>3</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-4 mt-1">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="is_active" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="1" @selected("1" == $product->is_active)>Activo</option>
                        <option value="0" @selected("0" == $product->is_active)>Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 text-center mt-1">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
