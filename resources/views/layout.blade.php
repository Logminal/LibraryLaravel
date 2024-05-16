<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=" {{ asset('/storage/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/font-awesome-4.7.0/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <header>
        <div class="container">

            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src=" {{ asset('/storage/img/logo.png') }}" alt="logo">
                </a>
            </div>

            <nav>
                <ul>

                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="#about">О нас</a></li>
                    <li><a href="{{ route('allBooksPerson') }}">Наши книги</a></li>

                    @if (!empty(Auth::user()))
                        <li><a href="{{ route('addPersonBook') }}">Предложить книгу</a></li>
                        @if (Auth::user()->name == 'admin')
                            <li><a href="{{ route('admin.index') }}">Панель админа</a></li>
                        @endif

                        <li><a href="{{ route('logout') }}">Выйти</a></li>
                    @else
                        <li><a href="{{ route('login.create') }}">Войти</a></li>
                        <li><a href="#reg">Стать участником</a></li>
                    @endif

                </ul>
            </nav>

        </div>
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        <h6>Авторские права © 2015-16 KodeForest. Все права защищены</h6>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src=" {{ asset('/storage/js/app.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
