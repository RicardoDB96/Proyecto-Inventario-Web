@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Inventory</h2>
        </div>
        <div>
            <a href="{{route('inventories.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('inventories.store')}}" method="POST">
        @csrf
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_id" class="form-control" placeholder="Product Name"  >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <textarea class="form-control" style="height:150px" name="amount" placeholder="Amount"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="is_active" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
