@extends('layouts.reset')

@section('title', 'Done!')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="symbol">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="text-container">
          <p>Success! Your password have been updated</p>
        </div>
    </div>
</div>
<a href="{{ route('login') }}" class="btn btn-custom">Volver al inicio de sesión</a>
@endsection

