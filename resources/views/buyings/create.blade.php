@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">Add new buyings</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href=""><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                <form action="{{ route('buyings.store') }}" method="POST">
                  @csrf
                  <label for="cliente">Cliente:</label>
                  <input type="text" name="client" required>
                  <!-- Otros campos de la venta -->

                  <!-- Sección de productos -->
                  <div id="productos">
                      <div class="producto">
                          <label for="producto_1">Producto:</label>
                          <select name="products[1][id]" required>
                              @foreach($products as $product)
                                  <option value="{{ $product->id }}">{{ $product->name }}</option>
                              @endforeach
                          </select>
                          <label for="cantidad_1">Cantidad:</label>
                          <input type="number" name="products[1][cantidad]" required>
                      </div>
                  </div>
                  <button type="button" onclick="agregarProducto()">Agregar Producto</button>

                  <button type="submit">Guardar Venta</button>
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
        <div class="product">
            <label for="product_${contadorProductos}">Producto:</label>
            <select name="products[${contadorProductos}][id]" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            <label for="cantidad_${contadorProductos}">Cantidad:</label>
            <input type="number" name="products[${contadorProductos}][cantidad]" required>
            <!-- Otros campos de los products -->
        </div>`;
        document.getElementById('productos').insertAdjacentHTML('beforeend', nuevoProducto);
    }
</script>
@endsection
