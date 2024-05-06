@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Buying resume</h1>
        <a href="{{route('buyings.index')}}" class="linkButton"><button class="button">BACK</button></a>
    </div>

    <div class="tableInfo table-responsive">
        <table class="table table-bordered text">
            <thead class="thead">
                <tr class="text-black">
                    <th>Product</th>
                    <th>Price</th>
                    <th>IVA</th>
                    <th>Amount</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($buying_rows as $buying_row)

                    <tr>
                        <th>{{$buying_row->product_id}}</th>
                        <th>{{$buying_row->price}}</th>
                        <th>{{$buying_row->iva}}</th>
                        <th>{{$buying_row->amount}}</th>
                        <th>{{$buying_row->subtotal}}</th>
                        <th>{{$buying_row->total}}</th>
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
