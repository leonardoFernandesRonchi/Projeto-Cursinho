<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Enem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Site Enem</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(session('user'))
                        <li class="nav-item">
                            <span class="nav-link text-white">Bem-vindo, {{ session('user.username') }}!</span>
                        </li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Sair</button>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Registrar</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Menu lateral -->
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active bg-success text-white border-0">Redações</li>
                    <li class="list-group-item list-group-item-action bg-light border-0"><a href="#" class="text-decoration-none text-dark">Simulados</a></li>
                    <li class="list-group-item list-group-item-action bg-light border-0"><a href="#" class="text-decoration-none text-dark">Exercícios</a></li>
                    <li class="list-group-item list-group-item-action bg-light border-0"><a href="#" class="text-decoration-none text-dark">Aulas</a></li>
                    <li class="list-group-item list-group-item-action bg-light border-0"><a href="#" class="text-decoration-none text-dark">Plano de Estudos</a></li>
                </ul>
            </div>

            <!-- Área de conteúdo -->
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
