@extends('layouts.base')

@section('content')


<div class="place">
    <h1>Crear Supplier</h1>

</div>
<div class="place">
    <a href="{{route('suppliers.index')}}" class="linkButton"><button class="button">VOLVER</button></a>
</div>


<div >

    <form action="{{route('suppliers.store')}}" method="POST">
        @csrf
        <div >

            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Supplier Name" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Address..."></textarea>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 mt-1">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="contact_phone" class="form-control" placeholder="Phone Number" >
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




