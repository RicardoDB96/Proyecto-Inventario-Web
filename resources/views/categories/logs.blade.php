@extends('layouts.base')

@section('content')

<div class="place">
    <h1>Category Logs</h1>
    <a href="{{ route('categories.index') }}" class="linkButton"><button class="button" id="buttonPlace">Back</button></a>
</div>

<div class="place" id="placeCel1">
    <a href="{{ route('categories.index') }}" class="linkButton"><button class="button">Back</button></a>
</div>

<div class="tableInfo table-responsive">
    <table class="table table-bordered text">
        <thead class="thead">
            <tr class="text-black">
                <th>ID</th>
                <th>Category ID</th>
                <th>User ID</th>
                <th>Action</th>
                <th>Description</th> <!-- Nueva columna para la descripción -->
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->category_id }}</td>
                <td>{{ $log->user_id }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->description }}</td> <!-- Mostrar la descripción -->
                <td>{{ $log->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
