<!DOCTYPE html>
<html lang="en" data-mode="light">
@extends('layouts.reset')

@section('title', 'Restablecer Contraseña')

@section('content')
<div class="card-body">
  <p class="p-center">If the account exists, we'll email you instructions to reset the password.</p>
  <form method="POST" action="">
    @csrf
    <div class="form-group">
      <label for="email">Correo Electrónico</label>
      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
    </div>
    <button type="submit" class="btn btn-custom btn-block">Restablecer Contraseña</button>
  </form>
  <div class="mt-3">
    <a href="{{ route('login') }}" class="text-muted">Volver a Iniciar Sesión</a>
  </div>
</div>
@endsection
</html>