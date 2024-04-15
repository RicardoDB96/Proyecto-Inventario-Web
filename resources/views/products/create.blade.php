@extends('layouts.base')

@section('content')


<div class="place">
    <h1>Crear Producto</h1>

</div>
<div class="place">
    <a href="{{route('products.index')}}" class="linkButton"><button class="button">VOLVER</button></a>
</div>


<div >

    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div >

            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Product Name" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description..."></textarea>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Base Price:</strong>
                    <input type="text" name="base_price" class="form-control" placeholder="Base Price" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Base Cost:</strong>
                    <input type="text" name="base_cost" class="form-control" placeholder="Base Cost" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-4 mt-1">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select name="category_id" class="form-select" id="">
                        <option value="">-- Elige la categoría --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-4 mt-1">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="is_active" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 text-center mt-1">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection




