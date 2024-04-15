@extends('layouts.base')

@section('content')


<div class="place">
    <h1>Editar Supplier</h1>

</div>
<div class="place">
    <a href="{{route('suppliers.index')}}" class="linkButton"><button class="button">VOLVER</button></a>
</div>


<div >

    <form action="{{route('suppliers.update',$supplier)}}" method="POST">
        @csrf
        @method('PUT')
        <div >

            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Supplier Name" value="{{$supplier->name}}" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Address...">{{$supplier->address}}"</textarea>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="contact_phone" class="form-control" placeholder="Phone Number" value="{{$supplier->contact_phone}}" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-4 mt-1">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="is_active" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="1" @selected("1" == $supplier->is_active)>Activo</option>
                        <option value="0" @selected("0" == $supplier->is_active)>Inactivo</option>
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




