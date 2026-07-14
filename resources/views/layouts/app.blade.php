<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Blog Pribadi')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#f8f9fa;
        }

        .navbar-brand{
            font-weight:bold;
        }

        .card{
            transition:.3s;
            overflow:hidden;
        }

        .card:hover{
            transform:translateY(-8px);
            box-shadow:0 .8rem 2rem rgba(0,0,0,.15)!important;
        }

        .card-img-top{
            transition:.4s;
        }

        .card:hover .card-img-top{
            transform:scale(1.03);
        }

        footer{
            margin-top:80px;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

    <div class="container">

        <a class="navbar-brand"
           href="{{ route('home') }}">

            📝 Blog Pribadi

        </a>

        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('home') }}">

                        Home

                    </a>

                </li>

                @auth

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('dashboard') }}">

                        Dashboard

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('articles.index') }}">

                        Artikel

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('categories.index') }}">

                        Kategori

                    </a>

                </li>

                @endauth

            </ul>

            <ul class="navbar-nav">

                @guest

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('login') }}">

                        Login

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('register') }}">

                        Register

                    </a>

                </li>

                @endguest

                @auth

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown">

                        <i class="bi bi-person-circle"></i>

                        {{ Auth::user()->name }}

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ route('profile.edit') }}">

                                Profile

                            </a>

                        </li>

                        <li>

                            <hr class="dropdown-divider">

                        </li>

                        <li>

                            <form
                                action="{{ route('logout') }}"
                                method="POST">

                                @csrf

                                <button
                                    class="dropdown-item">

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<div class="container py-5">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                class="btn-close"
                data-bs-dismiss="alert">

            </button>

        </div>

    @endif

    @yield('content')

</div>

<footer class="bg-dark text-white">

    <div class="container py-4 text-center">

        <h5>

            Blog Pribadi Laravel

        </h5>

        <p class="mb-1">

            Dibuat sebagai tugas mata kuliah Pemrograman Web.

        </p>

        <small>

            © {{ date('Y') }} Blog Pribadi. All Rights Reserved.

        </small>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>