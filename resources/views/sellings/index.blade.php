@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Sellings</h1>
        <a href="{{route('sellings.create')}}" class="linkButton"><button class="button" id="buttonPlace">NEW SELLING</button></a>
    </div>
    <div class="place" id="placeCel1">
        <a href="{{route('sellings.create')}}" class="linkButton"><button class="button">NEW SELLING</button></a>
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
        <div class="searchBox form-group">
            <form method="GET" action="{{route('products.search')}}" class="d-flex">
                <input class="form-control" name="query"  placeholder="Search..." >
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
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
                    <th>Client</th>
                    <th>Selling at</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sellings as $selling)

                    <tr>
                        <th class="fw-bold" ><a href="{{route('sellings.show', $selling)}}">{{$selling->id}}</a></th>
                        <th>{{$selling->client}}</th>
                        <th>{{$selling->created_at}}</th>
                        <th>{{$selling->subtotal}}</th>
                        <th>{{$selling->iva}}</th>
                        <th>{{$selling->total}}</th>
                    </tr>

                @empty
                    <tr>
                        <th>None</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{$sellings->links()}}
    </div>
@endsection
