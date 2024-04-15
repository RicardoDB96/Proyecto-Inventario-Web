

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css\app.css')}}" type="text/css" >

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

    <header class="header">

        <h1 class="titlePage">INVENTORY SYSTEM</h1>

        <nav class="headerSeccion">

            <h1 class="time">04:24:23 15-04-2024</h1>


            <a href="/pages/carrito.html"><button>USUARIO123</button></a>

        </nav>
    </header>

    <div class="wrapper">


        <nav class="barside">
            <ul class="barSections">
                <li><a href=""><h3 class="titleSeccion">DASHBOARD</h3></a></li>
                <li>
                    <h3 class="titleSeccion wth">USERS & ROLES</h3>
                    <a href="{{route('users.index')}}">Manage Users</a>
                    <a href="{{route('roles.index')}}">Manage Roles</a>
                </li>
                <li>
                    <h3 class="titleSeccion wth">SUPPLIERS</h3>
                    <a href="{{route('suppliers.index')}}">Manage Suppliers</a>
                    <a href="{{route('suppliers.create')}}">Add Supplier</a>
                </li>
                <li><a href="{{route('categories.index')}}"><h3 class="titleSeccion">CATEGORIES</h3></a></li>
                <li>
                    <h3 class="titleSeccion wth">PRODUCTS</h3>
                    <a href="{{route('products.index')}}">Manage Products</a>
                    <a href="{{route('products.create')}}">Add Product</a>
                </li>
                <li>
                    <h3 class="titleSeccion wth">INVENTORIES</h3>
                    <a href="{{route('inventories.index')}}">Manage Inventory</a>
                    <a href="{{route('inventories.create')}}">Add Inventory</a>
                </li>
                <li>
                    <h3 class="titleSeccion wth">BITACORIES</h3>
                    <a href="">Manage Bitacory</a>
                    <a href="">Add Register</a>
                </li>
            </ul>
        </nav>

        <div class="index">
             @yield('content')
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
