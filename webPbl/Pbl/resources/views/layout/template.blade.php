<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HaydayTeam - @yield('title', 'Website')</title>
    
    <link rel="icon" type="images/a.png" href="/images/a.png">
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-iqVj4T09brn9Pb5POM5XP1fu/owu9lv86mIyV+RXUnyCG+5zjaWitUqOGjnO5dOvP+G+TsV1WdpeRcPKA5wJNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success navbar-light text-dark text-center p-3" style="background: #37c582;">
        <div class="container">
            <a class="navbar-brand text-white"> <img src="/images/logo.png" alt="HaydayTeam" style="width: 30px; height: auto;">
                HaydayTeam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">



                    @if (!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="/">
                                <i class="bi bi-house-door"></i> Home
                            </a>
                        </li>
                    @endif
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="/homepage">
                                <i class="bi bi-house-door"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="/store">
                                <i class="bi bi-shop"></i> Store
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="/tutorial">
                                <i class="bi bi-activity"></i> Tutorial
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="/tutorial">
                                <i class="bi bi-prescription2"></i> Support
                            </a>
                        </li>

                    @endauth
                    @auth
                        @if (auth()->user()->role == 'admin')
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"> <i class="bi bi-eye"></i>
                                    Tinjau
                                </button>
                                <ul class="dropdown-menu">
                                    {{-- <li><a href="{{ route('Instansis.data') }}" class="btn">Data Progres</a></li> --}}
                                    <li><a href="/sensor-data" class="btn">Data Sensor</a></li>
                                    
                                    <li><a href="/data-pendaftar" class="btn">Data Member</a></li>

                                </ul>
                            </div>
                            <!-- Periksa apakah pengguna memiliki peran admin -->
                        @endif
                    @endauth

                    @auth
                        @if (auth()->user()->role == 'user')
                            <!-- Periksa apakah pengguna memiliki peran user -->
                            <li class="nav-item">
                                <a href="/data-pendaftar" class="nav-link active text-white" aria-current="page"> <i
                                        class="bi bi-database-fill-check"></i> Data
                                    Pendaftar</a>
                            </li>
                        @endif
                    @endauth

                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <form action="/homepage" class="d-flex" role="search">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    @endauth
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <form action="/logout" method="post">
                                    @csrf
                                    <li>
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </li>
                                </form>

                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link bg-primary" href="/login"><i class="bi bi-person-lock"></i> Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <div class="">
        @yield('content')
    </div>


        <footer class="text-dark text-center" style="background:  #37c582;">
            <div class="foot">
                <div class="row align-items-center">
                    <div class="col-md-1">
                        Contact us
                    </div>
                    <div class="col-md-1">
                        |
                    </div>
                    <div class="col-md-1">
                        Whatsapp
                    </div>
                    <div class="col-md-1">
                        |
                    </div>
                    <div class="col-md-2">
                        Instagram
                    </div>
                    <div class="col-md-1">
                        |
                    </div>
                    <div class="col-md-2">
                        Email
                    </div>
                    <div class="col-md-1">
                        |
                    </div>
                    <div class="col-md-2">
                        Address
                    </div>
                </div>
            </div>
        
            <div class="foot-two">
                <div class="row align-items-center">
                    <div class="col-md-1">
        
                    </div>
                    <div class="col-md-1">
                        |
                    </div>
                    <div class="col-md-1">
                        07771122
                    </div>
                    <div class="col-md-1">
                        |
                    </div>
                    <div class="col-md-2">
                        @haydayteam_
                    </div>
                    <div class="col-md-1">
                        |
                    </div>
                    <div class="col-md-2">
                        haydayteam@gmail.com
                    </div>
                    <div class="col-md-1">
                        |
                    </div>
                    <div class="col-md-2">
                        Politeknik Negeri Padang
                    </div>
                </div>
            </div>
            <br>
            <p>&copy; 2024 by Hayday Team - PBL TK2B</p>
       
        
    </footer>

    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>
