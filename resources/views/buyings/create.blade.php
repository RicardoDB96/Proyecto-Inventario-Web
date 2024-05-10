@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">Add New Buying</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('buyings.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('buyings.store') }}" method="POST">
                        @csrf


                        @if (Session::get('error'))
                        <div class="alert alert-danger">
                            <strong>{{Session::get('error')}}</strong>
                        </div>
                        @endif

                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <label for="cliente">Cliente:</label>
                                <input type="text" name="client" class="form-control" placeholder="Client" required>
                            </div>
                        </div>
                        <!-- Otros campos de la venta -->

                        <!-- Sección de productos -->
                        <div class="form-group row d-flex justify-content-center" id="productos">


                            <div class="producto form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="producto_1" >Producto:</label>
                                        <select name="products[1][p_id]" class="form-select" required>
                                            <option value="">Seleccione un producto</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="proveedor_1" >Supplier:</label>
                                        <select name="products[1][s_id]" class="form-select" required>
                                            <option value="">Select a supplier</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="cantidad_1" >Cantidad:</label>
                                        <input type="number" name="products[1][cantidad]" class="form-control" placeholder="Cantidad" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                            <button type="button" class="btn btn-primary" onclick="agregarProducto()">Add Product</button>
                            <button type="submit" class="btn btn-primary">Confirm Buying</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    let contadorProductos = 1;

    function agregarProducto() {
        contadorProductos++;
        const nuevoProducto = `
                            <div class="producto form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="product_${contadorProductos}" >Producto:</label>
                                        <select name="products[${contadorProductos}][p_id]" class="form-select" required>
                                            <option value="">Seleccione un producto</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="supplier_${contadorProductos}" >Supplier:</label>
                                        <select name="products[${contadorProductos}][s_id]" class="form-select" required>
                                            <option value="">Seleccione un proveedor</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="cantidad_${contadorProductos}" >Cantidad:</label>
                                        <input type="number" name="products[${contadorProductos}][cantidad]" class="form-control" placeholder="Cantidad" required>
                                    </div>
                                </div>
                                ${contadorProductos > 1 ? '<button type="button" class="btn btn-primary col-xs-12 col-sm-12 col-md-5 mt-4 mx-auto" onclick="eliminarProducto(this)">Eliminar</button>' : ''}
                            </div>`;
        document.getElementById('productos').insertAdjacentHTML('beforeend', nuevoProducto);
    }

    function eliminarProducto(botonEliminar) {
        contadorProductos--;
        // Obtener el div del producto que contiene el botón Eliminar
        const divProducto = botonEliminar.parentNode;

        // Eliminar el div del producto
        divProducto.remove();
    }
</script>
@endsection
