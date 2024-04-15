<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
     <!-- font awesome  -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
</head>
<body>
    <div class="row justify-content-center container-fluid">
      <div class="col-md-6 text-center">
        <img src="{{ asset('img/frostify.png') }}" alt="Frostify logo" class="card-img-top" style="height: 33vh; width: 33vh; object-fit: cover;">
        <h2 class="card-title mb-4">@yield('title', 'Titulo')</h2>
        @yield('content')
      </div>
    </div>
</body>
</html>
