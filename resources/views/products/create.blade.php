@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">ADD NEW PRODUCT</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('products.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Fill the requiered fields!</strong> try again...<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Product Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description:</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="height:150px;" name="description" placeholder="Description..."></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="base_price" class="col-md-4 col-form-label text-md-right">Base Price:</label>
                            <div class="col-md-6">
                                <input type="text" name="base_price" class="form-control" placeholder="Base Price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="base_cost" class="col-md-4 col-form-label text-md-right">Base Cost:</label>
                            <div class="col-md-6">
                                <input type="text" name="base_cost" class="form-control" placeholder="Base Cost">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Category:</label>
                            <div class="col-md-6">
                                <select name="category_id" class="form-select" id="">
                                    <option value="">-- Elige la categoría --</option>
                                    @foreach(\App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Sección de proveedores -->
                        <div class="form-group row d-flex justify-content-center" id="proveedores">
                            <div class="producto form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="supplier_1" >Supplier:</label>
                                        <select name="suppliers[1][id]" class="form-select" required>
                                            <option value="">Select a supplier</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-4 col-form-label text-md-right">Status:</label>
                            <div class="col-md-6">
                                <select name="is_active" class="form-select" id="">
                                    <option value="">-- Elige el status --</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="agregarProveedor()">Add Suppplier</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

let contadorProveedores = 1;

function agregarProveedor() {
    contadorProveedores++;
    const nuevoProveedor = `
                        <div class="producto form-group row">
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="supplier_${contadorProveedores}" >Supplier:</label>
                                    <select name="suppliers[${contadorProveedores}][id]" class="form-select" required>
                                        <option value="">Select a supplier</option>
                                        @foreach($suppliers as $supplier)
                                            <option value={{ $supplier->id }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            ${contadorProveedores > 1 ? '<button type="button" class="btn btn-primary col-xs-12 col-sm-12 col-md-4 mt-2 mx-auto" onclick="eliminarProveedor(this)">Eliminar</button>' : ''}
                        </div>`;
    document.getElementById('proveedores').insertAdjacentHTML('beforeend', nuevoProveedor);
}

    function eliminarProveedor(botonEliminar) {
        contadorProveedores--;
        // Obtener el div del producto que contiene el botón Eliminar
        const divProveedor = botonEliminar.parentNode;

        // Eliminar el div del producto
        divProveedor.remove();
    }
</script>
@endsection
