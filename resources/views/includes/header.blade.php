<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .dropdown-menu {
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            color: #212529;
        }

        .dropdown-item:hover {
            background-color: #e9ecef;
        }

        .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }

        #dropdownMenuButton {
            background-color: white;
            color: #212529;
            border: #ffffff solid;
        }

        .img {
            width: 150px;
        }

        .i {
            padding-right: 15px;
        }

        img {
            width: 180px;
        }

        .sidebar {
            height: 95%;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    @if (\Session::has('success'))
        <script>
            Swal.fire(
                '',
                '{{ \Session::get('success') }}',
                'success'
            )
        </script>
    @endif

    @if (\Session::has('info'))
        <script>
            Swal.fire(
                '',
                '{{ \Session::get('info') }}',
                'info'
            )
        </script>
    @endif

    @if (\Session::has('error'))
        <script>
            Swal.fire(
                'Gabim!',
                '{{ \Session::get('error') }}',
                'error'
            )
        </script>
    @endif

    <div class="shadow-lg pt-3 pb-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="col">
                        @if (Auth::user()->role == 0)
                            <a href="{{ route('dashboard') }}">
                                <img class="img" src="{{ asset('images/logo.jpg') }}" alt="Logo">
                            </a>
                        @elseif (Auth::user()->role == 1)
                            <a href="{{ route('menaxher.index') }}">
                                <img class="img" src="{{ asset('images/logo.jpg') }}" alt="Logo">
                            </a>
                        @endif
                    </div>
                    <div class="ml-auto"> <!-- Add this div to align items to the right -->
                        <div class="dropdown">
                            <i class="fa-regular fa-user align-middle"></i>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                            style="padding-right: 15px;"
                                            class="fa fa-user font-size-16 align-middle me-1"></i>Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i
                                                class="fas fa-sign-out-alt font-size-16 align-middle me-1 i"></i>Log
                                            Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        </nav>

    </div>
    <div class="container-fluid mb-5">
        <div class="row">
            <!-- Modal Column (3 parts out of 12) -->
            <div class="col-md-2">
                <div class="container shadow-lg mt-5 sidebar">
                    <nav class="navbar navbar-expand-lg navbar-light p-5">
                        <div class="collapse navbar-collapse w-auto">
                            <ul class="navbar-nav flex-column">
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <i class="fa fa-user fa-4x"></i>
                                </div>
                                <div class="text-center mt-2">
                                    <span class="nav-link-text ms-1">Welcome, back!</span>
                                    <br>
                                    <span class="nav-link-text ms-1">{{ Auth::user()->name }}</span>
                                </div>
                                @if (Auth::user()->role == 0)
                                    <hr>
                                    <li class="nav-item mt-3">
                                        <h6 class=" ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Faqja
                                            Kryesore</h6>
                                    </li>



                                    <ul class="navbar-nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('produktet') }}">
                                                <div
                                                    class="icon icon-shape icon-sm border-radius-md  me-2 d-flex align-items-center justify-content-left">
                                                    <i class="fa fa-shopping-basket text-sm opacity-10"></i>
                                                    <span class="nav-link-text ms-1 ps-2">Produktet</span>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- ... (previous list items) ... -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('historiku') }}">
                                                <div
                                                    class="icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-left">
                                                    <i class="fa fa-clock-rotate-left text-sm opacity-10"></i>
                                                    <span class="nav-link-text ms-1 ps-2">Historiku</span>
                                                </div>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">
                                                <div
                                                    class="icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-left">
                                                    <i class="fa fa-wallet text-sm opacity-10"></i>
                                                    <span class="nav-link-text ms-1 ps-2">Portofoli</span>
                                                </div>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('preferencat') }}">
                                                <div
                                                    class="icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-left">
                                                    <i class="fa fa-heart text-sm opacity-10"></i>
                                                    <span class="nav-link-text ms-1 ps-2">Preferencat</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                @endif

                                @if (Auth::user()->role == 1)
                                    <hr>
                                    <li class="nav-item mt-2">
                                        <h6 class=" ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Faqja
                                            Kontrollit</h6>
                                    </li>

                                    <ul class="navbar-nav flex-column">
                                        <a class="nav-link" href="{{ route('menaxher.index') }}">
                                            <div
                                                class="icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-left">
                                                <i class="fa fa-display text-sm opacity-10"></i>
                                                <span class="nav-link-text ms-1 ps-2">Control Panel</span>
                                            </div>
                                        </a>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#"
                                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <div
                                                    class="icon icon-shape icon-sm border-radius-md  me-2 d-flex align-items-center justify-content-left">
                                                    <i class="fa fa-gears text-sm opacity-10"></i>
                                                    <span class="nav-link-text ms-1 ps-2">Proceset </span>
                                                    {{-- @if ($pro > 0)
                                                        <div
                                                            class="unread_count badge rounded-pill text-light bg-danger">
                                                            {{ $pro }}</div>
                                                    @endif --}}
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menaxher.ne_shqyrtim') }}">Për
                                                        shqyrtim
                                                        {{-- @if ($ne_shqyrtim > 0)
                                                            <div
                                                                class="unread_count badge rounded-pill text-light bg-danger">
                                                                {{ $ne_shqyrtim }}</div>
                                                        @endif --}}
                                                    </a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menaxher.konfirmo') }}">Për konfirmim
                                                        {{-- @if ($konfirmo > 0)
                                                            <div
                                                                class="unread_count badge rounded-pill text-light bg-danger">
                                                                {{ $konfirmo }}</div>
                                                        @endif --}}
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menaxher.refuzuar') }}">Refuzuar
                                                        {{-- @if ($refuzo > 0)
                                                            <div
                                                                class="unread_count badge rounded-pill text-light bg-danger">
                                                                {{ $refuzo }}</div>
                                                        @endif --}}
                                                    </a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menaxher.per_prodhim') }}">Për prodhim
                                                        {{-- @if ($per_prodhim > 0)
                                                            <div
                                                                class="unread_count badge rounded-pill text-light bg-danger">
                                                                {{ $per_prodhim }}</div>
                                                        @endif --}}
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menaxher.oferta_refuzuar') }}">Oferta
                                                        Refuzuar
                                                        {{-- @if ($oferta_refuzuar > 0)
                                                            <div
                                                                class="unread_count badge rounded-pill text-light bg-danger">
                                                                {{ $oferta_refuzuar }}</div>
                                                        @endif --}}
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menaxher.ne_proces') }}">Në proces
                                                        {{-- @if ($ne_proces > 0)
                                                            <div
                                                                class="unread_count badge rounded-pill text-light bg-danger">
                                                                {{ $ne_proces }}</div>
                                                        @endif --}}
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('menaxher.perfunduar') }}">Përfunduar</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('menaxher.kerkesat') }}">
                                                <div
                                                    class="icon icon-shape icon-sm border-radius-md ps-1 me-1 d-flex align-items-center justify-content-left">
                                                    <i class="fa fa-dollar-sign text-sm opacity-10"></i>
                                                    <span class="nav-link-text ms-1 ps-2">Kërkesat</span>
                                                </div>

                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
