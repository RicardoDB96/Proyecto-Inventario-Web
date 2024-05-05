<!DOCTYPE html>
<html lang="en" data-mode="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frostify</title>

    <script type="text/javascript" src="{{asset('js/localStorageSwitch.js') }}"></script>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>

    <header class="header">

        <div>
            <button id="showHide" class="sidebarButton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
              </svg></button>
            <h1 class="titlePage" id="titlePageHead">INVENTORY SYSTEM</h1>
        </div>

        <h1 class="time" id="timeHead">{{ now()->toDateString() }} {{ now()->toTimeString() }}</h1>

        <nav class="headerSeccion">
            <div class ="headerGroup">
                <div class="themeSwitcher">

                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class= "iconSun">
                        <path d="M12 5.53125C11.7265 5.53125 11.4642 5.4226 11.2708 5.2292C11.0774 5.03581 10.9688 4.7735 10.9688 4.5V2.25C10.9688 1.9765 11.0774 1.71419 11.2708 1.5208C11.4642 1.3274 11.7265 1.21875 12 1.21875C12.2735 1.21875 12.5358 1.3274 12.7292 1.5208C12.9226 1.71419 13.0312 1.9765 13.0312 2.25V4.5C13.0312 4.7735 12.9226 5.03581 12.7292 5.2292C12.5358 5.4226 12.2735 5.53125 12 5.53125Z" />
                        <path d="M12 22.7812C11.7265 22.7812 11.4642 22.6726 11.2708 22.4792C11.0774 22.2858 10.9688 22.0235 10.9688 21.75V19.5C10.9688 19.2265 11.0774 18.9642 11.2708 18.7708C11.4642 18.5774 11.7265 18.4688 12 18.4688C12.2735 18.4688 12.5358 18.5774 12.7292 18.7708C12.9226 18.9642 13.0312 19.2265 13.0312 19.5V21.75C13.0312 22.0235 12.9226 22.2858 12.7292 22.4792C12.5358 22.6726 12.2735 22.7812 12 22.7812Z" />
                        <path d="M17.3034 7.72781C17.0995 7.72779 16.9002 7.66731 16.7306 7.55402C16.5611 7.44073 16.4289 7.27972 16.3509 7.09134C16.2728 6.90296 16.2523 6.69566 16.2921 6.49565C16.3318 6.29565 16.4299 6.11191 16.5741 5.96766L18.165 4.37672C18.3592 4.18753 18.6202 4.08245 18.8913 4.08424C19.1625 4.08602 19.422 4.19453 19.6137 4.38626C19.8055 4.57799 19.914 4.83753 19.9158 5.10867C19.9175 5.37982 19.8125 5.64076 19.6233 5.835L18.0323 7.42594C17.9367 7.52178 17.8231 7.59778 17.698 7.64959C17.5729 7.70139 17.4388 7.72798 17.3034 7.72781Z" />
                        <path d="M5.10562 19.9256C4.90165 19.9256 4.70226 19.8651 4.53268 19.7517C4.3631 19.6384 4.23095 19.4773 4.15292 19.2888C4.0749 19.1004 4.05452 18.893 4.09435 18.693C4.13418 18.4929 4.23245 18.3092 4.37671 18.165L5.96765 16.5741C6.06294 16.4762 6.17671 16.3983 6.30236 16.3448C6.42801 16.2913 6.56304 16.2633 6.6996 16.2624C6.83617 16.2615 6.97155 16.2877 7.0979 16.3396C7.22424 16.3914 7.33903 16.4678 7.4356 16.5644C7.53217 16.661 7.60859 16.7758 7.66044 16.9021C7.71228 17.0284 7.73852 17.1638 7.73762 17.3004C7.73672 17.437 7.70871 17.572 7.6552 17.6976C7.60169 17.8233 7.52376 17.9371 7.42593 18.0323L5.83499 19.6233C5.73933 19.7192 5.62565 19.7954 5.50048 19.8472C5.37531 19.8991 5.24112 19.9258 5.10562 19.9256Z" />
                        <path d="M21.75 13.0312H19.5C19.2265 13.0312 18.9642 12.9226 18.7708 12.7292C18.5774 12.5358 18.4688 12.2735 18.4688 12C18.4688 11.7265 18.5774 11.4642 18.7708 11.2708C18.9642 11.0774 19.2265 10.9688 19.5 10.9688H21.75C22.0235 10.9688 22.2858 11.0774 22.4792 11.2708C22.6726 11.4642 22.7812 11.7265 22.7812 12C22.7812 12.2735 22.6726 12.5358 22.4792 12.7292C22.2858 12.9226 22.0235 13.0312 21.75 13.0312Z" />
                        <path d="M4.5 13.0312H2.25C1.9765 13.0312 1.71419 12.9226 1.5208 12.7292C1.3274 12.5358 1.21875 12.2735 1.21875 12C1.21875 11.7265 1.3274 11.4642 1.5208 11.2708C1.71419 11.0774 1.9765 10.9688 2.25 10.9688H4.5C4.7735 10.9688 5.03581 11.0774 5.2292 11.2708C5.4226 11.4642 5.53125 11.7265 5.53125 12C5.53125 12.2735 5.4226 12.5358 5.2292 12.7292C5.03581 12.9226 4.7735 13.0312 4.5 13.0312Z" />
                        <path d="M18.8944 19.9256C18.7589 19.9258 18.6247 19.8991 18.4995 19.8472C18.3743 19.7953 18.2607 19.7192 18.165 19.6233L16.5741 18.0323C16.3849 17.8381 16.2798 17.5772 16.2816 17.306C16.2834 17.0349 16.3919 16.7753 16.5836 16.5836C16.7753 16.3919 17.0349 16.2834 17.306 16.2816C17.5772 16.2798 17.8381 16.3849 18.0323 16.5741L19.6233 18.165C19.7675 18.3092 19.8658 18.4929 19.9056 18.693C19.9455 18.893 19.9251 19.1004 19.8471 19.2888C19.769 19.4773 19.6369 19.6384 19.4673 19.7517C19.2977 19.8651 19.0983 19.9256 18.8944 19.9256Z" />
                        <path d="M6.69656 7.72781C6.56116 7.72808 6.42704 7.70154 6.30194 7.64973C6.17684 7.59792 6.06323 7.52186 5.96766 7.42594L4.37672 5.835C4.18753 5.64076 4.08245 5.37982 4.08424 5.10867C4.08602 4.83753 4.19453 4.57799 4.38626 4.38626C4.57799 4.19453 4.83753 4.08602 5.10867 4.08424C5.37982 4.08245 5.64076 4.18753 5.835 4.37672L7.42594 5.96766C7.57007 6.11191 7.6682 6.29565 7.70793 6.49565C7.74765 6.69566 7.72719 6.90296 7.64913 7.09134C7.57107 7.27972 7.43891 7.44073 7.26936 7.55402C7.09981 7.66731 6.90048 7.72779 6.69656 7.72781Z" />
                        <path d="M12 16.7813C11.0544 16.7813 10.13 16.5008 9.34368 15.9755C8.55741 15.4501 7.94458 14.7034 7.5827 13.8297C7.22082 12.956 7.12614 11.9947 7.31062 11.0672C7.49511 10.1398 7.95048 9.28782 8.61915 8.61915C9.28782 7.95048 10.1398 7.49511 11.0672 7.31062C11.9947 7.12614 12.956 7.22082 13.8297 7.5827C14.7034 7.94458 15.4501 8.55741 15.9755 9.34368C16.5008 10.13 16.7813 11.0544 16.7813 12C16.7798 13.2676 16.2755 14.4829 15.3792 15.3792C14.4829 16.2755 13.2676 16.7798 12 16.7813Z" />
                    </svg>

                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class= "iconMoon">
                        <path d="M12.375 22.5C9.49077 22.5 6.72467 21.3542 4.68521 19.3148C2.64576 17.2753 1.5 14.5092 1.5 11.625C1.5 7.21875 4.03125 3.26813 7.95047 1.56235C8.0886 1.50215 8.24165 1.48495 8.3897 1.51299C8.53774 1.54103 8.6739 1.61301 8.78045 1.71956C8.88699 1.8261 8.95897 1.96226 8.98701 2.11031C9.01506 2.25835 8.99786 2.41141 8.93766 2.54953C8.48766 3.58266 8.25 4.90594 8.25 6.375C8.25 11.5444 12.4556 15.75 17.625 15.75C19.0941 15.75 20.4173 15.5123 21.4505 15.0623C21.5886 15.0021 21.7417 14.9849 21.8897 15.013C22.0377 15.041 22.1739 15.113 22.2804 15.2196C22.387 15.3261 22.459 15.4623 22.487 15.6103C22.5151 15.7583 22.4979 15.9114 22.4377 16.0495C20.7319 19.9688 16.7813 22.5 12.375 22.5Z"/>
                    </svg>
                </div>

                @if (Route::has('login'))

                    @auth
                        <form action="/logout" method="POST" style=" display:inline ">
                            @csrf
                            <a href="#" onclick="this.closest('form').submit()" class="buttonHead"><button id="buttonHead">Log out</button></a>
                        </form>
                    @endauth

                @endif

            </div>

        </nav>
    </header>

    <div class="wrapper">

        <nav class="barside" id="barside">
            <ul class="barSections" id="headerBar">
                <li><h1 class="titlePageBarside">INVENTORY SYSTEM</h1>
                    <h1 class="timeBarside">{{ now()->toDateString() }} {{ now()->toTimeString() }}</h1>
                </li>

                <li><a href=""><h3 class="titleSeccion">MI CUENTA</h3></a></li>

            </ul>
            <ul class="barSections">

                <li><a href="{{route('dashboards.index')}}"><h3 class="titleSeccion">DASHBOARD</h3></a>
                    <a href="{{route('sellings.create')}}">Registrar venta</a>
                    <a href="{{route('buyings.create')}}">Registrar compra</a>
                </li>

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
                <li><a href="{{route('inventories.index')}}"><h3 class="titleSeccion">INVENTORIES</h3></a></li>
                <li><a href="{{route('bitacories.index')}}"><h3 class="titleSeccion">BITACORIES</h3></a></li>
            </ul>
        </nav>

        <div class="index">
             @yield('content')
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js/switchFunction.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/sidebar.js') }}"></script>

</body>
</html>
