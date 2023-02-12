{{--template base --}}

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="<?= url('css/bootstrap.css');?>">
    <link href="<?= url('css/estilos.css');?>"  rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg text-light  navbar-light  ">
        <h1 class="text-black">El gato en la caja</h1>

        <ul class="nav" >


            <li class="nav-item"><a class="nav-link text-black " href="{{ url('/') }} ">Home</a></li>

            <li class="nav-item"><a class="nav-link text-black  " href="{{ url('admin/noticias') }}">Admin publicaciones</a></li>
            <li class="nav-item"><a class="nav-link text-black  " href="{{ url('admin/usuarios') }}">Lista de usuarios</a></li>
            <li class="nav-item"><a class="nav-link text-black  " href="{{ route('perfil') }}">Mi perfil</a></li>
            <li class="nav-item">
                <form action="{{ route('auth/logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn nav-link  text-danger">Cerrar Sesión</button>
                </form>
            </li>
        </ul>

    </nav>
</header>
<main>
    @if(Session::has('status.message'))
        <div class="alert alert-{{ Session::get('status.type') ?? 'info' }}">{!! Session::get('status.message') !!}</div>
    @endif
    <section class="container py-4">
        @yield('main')
    </section>
</main>
<footer class="mt-lg-5">
    <p class="mb-0 text-center mt-lg-4 text-light">&copy;2022 DaVinci</p>

</footer>
@stack('js')
</body>
</html>
