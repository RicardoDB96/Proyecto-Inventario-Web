@extends('layouts.reset')

@section('title', 'Done!')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="symbol">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="text-container">
          <p>We’ve sent an email to example@gmail.com with instructions.</p>
        </div>
    </div>
</div>

<p>If the email doesn't show up soon, check your spam folder. We sent it from enterprise@gmail.com.</p>
<a href="{{ route('login') }}" class="btn btn-custom">Volver al inicio de sesión</a>
@endsection
