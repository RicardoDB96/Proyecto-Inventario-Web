@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Crear Supplier</h1>
</div>

<div class="place">
    <a href="{{ route('suppliers.index') }}" class="linkButton"><button class="button">VOLVER</button></a>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #E9E6DD;">
                <div class="card-header d-flex justify-content-start" style="background-color: #C4AD9D;">
                    <h4 class="mb-0">ADD NEW SUPPLIER</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('suppliers.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Supplier Name" style="background-color: #D7D7D7;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address:</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="height:150px; background-color: #D7D7D7;" name="address" placeholder="Address..."></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact_phone" class="col-md-4 col-form-label text-md-right">Phone Number:</label>
                            <div class="col-md-6">
                                <input type="text" name="contact_phone" class="form-control" placeholder="Phone Number" style="background-color: #D7D7D7;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-4 col-form-label text-md-right">Status:</label>
                            <div class="col-md-6">
                                <select name="is_active" class="form-select" id="" style="background-color: #D7D7D7;">
                                    <option value="">-- Elige el status --</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

