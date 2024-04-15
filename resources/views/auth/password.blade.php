@extends('layouts.reset')

@section('title', 'Restablecer Contraseña')

@section('content')
<div class="card-body">
  <form method="POST" action="#">
    @csrf
    <label for="password">Contraseña:</label>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" id="password" required>
            <div class="input-group-append">
              <span class="input-group-text" onclick="password_show_hide();">
                <i class="fas fa-eye" id="show_eye"></i>
                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
              </span>
            </div>
          </div>

          <label for="password">Confirmar contraseña:</label>
          <div class="input-group mb-3">
            <input name="password_confirm" type="password" class="form-control" id="password_confirm" required>
            <div class="input-group-append">
              <span class="input-group-text" onclick="password_show_hide_confirm();">
                <i class="fas fa-eye" id="show_eye_confirm"></i>
                <i class="fas fa-eye-slash d-none" id="hide_eye_confirm"></i>
              </span>
            </div>
          </div>
          
    <button type="submit" class="btn btn-custom btn-block">Restablecer Contraseña</button>
  </form>
</div>

<script>
    function password_show_hide() {
      var x = document.getElementById("password");
      var show_eye = document.getElementById("show_eye");
      var hide_eye = document.getElementById("hide_eye");
      hide_eye.classList.remove("d-none");
      if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
      } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
      }
    }

    function password_show_hide_confirm() {
      var x = document.getElementById("password_confirm");
      var show_eye = document.getElementById("show_eye_confirm");
      var hide_eye = document.getElementById("hide_eye_confirm");
      hide_eye.classList.remove("d-none");
      if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
      } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
      }
    }
  </script>
@endsection
