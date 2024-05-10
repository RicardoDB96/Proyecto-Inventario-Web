@extends('layouts.base')

@section('content')
    <div class="place">
        <h1>Sellings</h1>
        <div class="button-group">
            <a href="{{route('sellings.create')}}" class="linkButton"><button class="button" id="buttonPlace">New Selling</button></a>
            <a href="{{ route('sellings.index') }}" class="linkButton"><button class="button" id="buttonPlace">Back</button></a>
        </div>
    </div>
    <div class="place" id="placeCel1">
        <div class="button-group">
            <a href="{{route('sellings.create')}}" class="linkButton"><button class="button">New Selling</button></a>
            <a href="{{ route('sellings.index') }}" class="linkButton"><button class="button">Back</button></a>
        </div>
    </div>
    <div class="place d-flex column flex-wrap align-items-end ">
        <div class="searchBox form-group">
            <form method="GET" action="{{route('selling.search')}}" class="d-flex">
                <input class="form-control" name="query"  placeholder="Search..." >
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <div class=" form-group mt-3" id="categoriasPlace">
            <form method="GET" action="/selling/filter" class="d-flex column flex-wrap justify-content-center">
                <div>
                    <label>Start Date: </label>
                    <input type="date" name="start_date" class="form-control">
                </div>
                <div>
                    <label>End Date: </label>
                    <input type="date" name="end_date" class="form-control">
                </div>

                <div class="d-flex align-items-end ">
                    <button type="submit" class="btn btn-primary py-3 px-3">Filter</button>
                    <a href="{{ route('sellings.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
                </div>
            </form>
        </div>

    </div>

    <div class="place" id="placeCel2">
        <div class="form-group">
            <form method="GET" action="/selling/filter" class="d-flex row flex-wrap justify-content-center">
                <div class="mb-3">
                    <label>Start Date: </label>
                    <input type="date" name="start_date" class="form-control">
                </div>
                <div class="mb-3">
                    <label>End Date: </label>
                    <input type="date" name="end_date" class="form-control">
                </div>

                <div class="d-flex align-items-end justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary py-3 px-3 ">Filter</button>
                    <a href="{{ route('sellings.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
                </div>
            </form>
        </div>
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
