@extends('layouts.base')

@section('content')

<div class="place">
    <h1>Editar Inventory</h1>

</div>
<div class="place">
    <a href="{{route('inventories.index')}}" class="linkButton"><button class="button">VOLVER</button></a>
</div>

<div >

    <form action="{{route('inventories.update', $inventory)}}" method="POST">
        @csrf
        @method('PUT')
        <div >

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_id" class="form-control" placeholder="Inventory Name" value="{{$inventory->product_id}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <textarea class="form-control" style="height:150px" name="amount" placeholder="Amount">{{$inventory->amount}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="is_active" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="1" @selected("1" == $inventory->is_active)>Activo</option>
                        <option value="0" @selected("0" == $inventory->is_active)>Inactivo</option>
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
