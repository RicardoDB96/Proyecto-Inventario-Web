@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Buyings</h1>
    <div class="button-group">
        <a href="{{ route('buyings.create') }}" class="linkButton"><button class="button" id="buttonPlace">New Buying</button></a>
        <a href="{{ route('buyings.index') }}" class="linkButton"><button class="button" id="buttonPlace">Back</button></a>
    </div>
</div>
<div class="place" id="placeCel1">
    <div class="button-group">
        <a href="{{ route('buyings.create') }}" class="linkButton"><button class="button">New Buying</button></a>
        <a href="{{ route('buyings.index') }}" class="linkButton"><button class="button">Back</button></a>
    </div>
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
        <form method="GET" action="{{route('buying.search')}}" class="d-flex">
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
                <tr>
                    <th>Id</th>
                    <th>Client</th>
                    <th>Buying at</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Total</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($buyings as $buying)

                    <tr>
                        <th class="fw-bold" ><a href="{{route('buyings.show', $buying)}}">{{$buying->id}}</a></th>
                        <th>{{$buying->client}}</th>
                        <th>{{$buying->created_at}}</th>
                        <th>{{$buying->subtotal}}</th>
                        <th>{{$buying->iva}}</th>
                        <th>{{$buying->total}}</th>
                    </tr>

                @empty
                    <tr>
                        <th>None</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{$buyings->links()}}
    </div>
@endsection
