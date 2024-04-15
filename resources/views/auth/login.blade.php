<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frostify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <!-- Columna para el logo -->
      <div class="col-md-6">
        <img src="{{ asset('img/frostify.png') }}" alt="Frostify Logo" class="img-fluid">
      </div>
      <!-- Columna para el formulario -->
      <div class="col-md-6">
        <h1 class="text-center mb-4">Frostify</h1>
        
        <!-- Formulario de login --->
        <form action="" method="POST">
          @csrf
          <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" value="{{ old('email') }}" autofocus name="email" required>
          </div>

          
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

          <a href="{{ route('reset') }}" class="forgot-password">¿Olvidaste tu contraseña?</a>
          
          <!--<label class="remember">
            <input type="checkbox" name="remember">
            Recuerdame
          </label>-->

          @if($errors->any())
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif

          <button type="submit" class="btn btn-custom">Iniciar Sesión</button>
        </form>
      </div>
    </div>
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
  </script>

</body>
</html>
