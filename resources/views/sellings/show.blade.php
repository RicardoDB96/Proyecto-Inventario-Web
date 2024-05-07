@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Selling resume</h1>
        <a href="{{route('sellings.index')}}" class="linkButton"><button class="button">BACK</button></a>
    </div>

    <div class="tableInfo table-responsive">
        <table class="table table-bordered text">
            <thead class="thead">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>IVA</th>
                    <th>Amount</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($selling_rows as $selling_row)

                    <tr>
                        <th>{{$selling_row->product->name}}</th>
                        <th>{{$selling_row->price}}</th>
                        <th>{{$selling_row->iva}}</th>
                        <th>{{$selling_row->amount}}</th>
                        <th>{{$selling_row->subtotal}}</th>
                        <th>{{$selling_row->total}}</th>
                    </tr>

                @empty
                    <tr>
                        <th>None</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
