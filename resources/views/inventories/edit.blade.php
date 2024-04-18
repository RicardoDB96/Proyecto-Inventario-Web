@extends('layouts.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mb-0">EDIT INVENTORY</h4>
                    <div class="col-md-0 offset-md-0">
                        <a href="{{ route('inventories.index') }}"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('inventories.update',$inventory)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Product ID:</label>
                            <div class="col-md-6">
                                <input type="text" name="product_id" class="form-control" placeholder="Product ID" value="{{$inventory->product_id}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Amount:</label>
                            <div class="col-md-6">
                                <input type="text" name="amount" class="form-control" placeholder="Amount..." value="{{$inventory->amount}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_active" class="col-md-4 col-form-label text-md-right">Category:</label>
                            <div class="col-md-6">
                                <select name="category_id" class="form-select" id="">
                                    <option value="">-- Elige el status --</option>
                                    <option value="1" @selected("1" == $inventory->is_active)>Activo</option>
                                    <option value="0" @selected("0" == $inventory->is_active)>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
