@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Bitacories</h1>
    <a href="" class="linkButton"><button class="button" id="buttonPlace">NEW BITACORY</button></a>
</div>
<div class="place" id="placeCel1">
    <a href="" class="linkButton"><button class="button">NEW BITACORY</button></a>
</div>
<div class="place" id="placeCel2">
    <select name="categorias">
        <option value="">-- Buscar por: --</option>
        <option value="1">Nombre</option>
        <option value="2">Fecha</option>
        <option value="3">Cantidad</option>
    </select>
</div>
<div class="place">
    <div class="searchBox">
        <input type="text" name="base_cost"  placeholder="Barra de busqueda..." >
    </div>

    <select name="categorias" id="categoriasPlace">
        <option value="">-- Buscar por: --</option>
        <option value="1">Nombre</option>
        <option value="2">Fecha</option>
        <option value="3">Cantidad</option>
    </select>
</div>

@if (Session::get('success'))
        <div class="alert alert-success">
            <strong>{{Session::get('success')}}</strong>
        </div>
@endif

    <div class="tableInfo table-responsive">
        <table class="table table-bordered text">
            <thead class="thead">
                <tr class="text-black">
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Base Price</th>
                    <th>Base Cost</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>


                    <tr class="data">
                        <th></th>
                        <th class="fw-bold" ><a href=""></a></th>
                        <th class="setWidth concat"><div class="desc"></div></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <div class="d-flex column flex-wrap gap-2">
                                <a href="" class="btn btn-warning">Editar</a>

                                <form action="" class="d-inline">

                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </th>
                    </tr>


            </tbody>
        </table>

    </div>
@endsection
