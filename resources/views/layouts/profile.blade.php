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
                        <a href="{{ route('dashboard') }}">
                            <img class="img" src="{{ asset('images/logo.jpg') }}" alt="Logo">
                        </a>
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
