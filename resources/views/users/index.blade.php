@extends('layouts.base')

@section('content')
<div class="place">
    <h1>Users</h1>
    <div class="button-group">
        <a href="{{ route('users.create') }}" class="linkButton"><button class="button" id="buttonPlace">New User</button></a>
    </div>
</div>
<div class="place" id="placeCel1">
    <div class="button-group">
        <a href="{{ route('users.create') }}" class="linkButton"><button class="button">New User</button></a>
    </div>
</div>
<div class="place d-flex column flex-wrap align-items-end ">
    <div class="searchBox form-group">
        <form method="GET" action="{{route('user.search')}}" class="d-flex">
            <input class="form-control" name="query"  placeholder="Search..." >
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class=" form-group mt-3" id="categoriasPlace">
        <form method="GET" action="/user/filter" class="d-flex column flex-wrap justify-content-center">
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
                <a href="{{ route('users.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
            </div>
        </form>
    </div>

</div>

<div class="place" id="placeCel2">
    <div class="form-group">
        <form method="GET" action="/user/filter" class="d-flex row flex-wrap justify-content-center">
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
                <a href="{{ route('users.index') }}"><button class="btn btn-secondary py-3 px-3" type="button">Clean</button></a>
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
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)

                    <tr>
                        <th>{{$user->id}}</th>
                        <th class="fw-bold" ><a href="{{route('users.show', $user)}}">{{$user->name}}</a></th>
                        <th>{{$user->last_name}}</th>
                        <th>{{$user->role->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>
                            @if ($user->is_active)
                                <span class="badge bg-success fs-6">Activo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inactivo</span>
                            @endif
                        </th>
                        <th>{{$user->created_at}}</th>
                        <th>
                            <a href="{{route('users.edit', $user)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('users.destroy', $user)}}" method="POST" class="d-inline">
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
        {{$users->links()}}
    </div>
@endsection
