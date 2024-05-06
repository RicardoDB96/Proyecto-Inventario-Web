@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Buying</h1>
        <a href="{{route('buyings.create')}}" class="linkButton"><button class="button">NEW BUYING</button></a>
    </div>
    <div class="place">
        <div class="searchBox">
            <input type="text" name="base_cost"  placeholder="Barra de busqueda..." >
        </div>

        <select name="categorias">
            <option value="">-- Buscar por: --</option>
            <option value="1">Nombre</option>
            <option value="2">Fecha</option>
            <option value="3">Cantidad</option>
        </select>
    </div>

    <div class="tableInfo table-responsive">
        <table class="table table-bordered text">
            <thead class="thead">
                <tr class="text-black">
                    <th>Id</th>
                    <th>Client</th>
                    <th>Buying at</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Actions</th>
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
                        <th>
                            <a href="" class="btn btn-warning">Editar</a>

                            <form action="" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </th>
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
