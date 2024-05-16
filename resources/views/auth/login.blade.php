@extends('layout')

@section('content')
    <div class="log" style="background-image: url('{{ asset('/storage/img/banner-3.png') }}');">
        <div class="overlay">
            <div class="container">
                <div class="lf">
                    <h2>Добро пожаловать в нашу библиотеку</h2>
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>
                                {{ $item }}
                            </li>
                        @endforeach

                        @if (!empty($message))
                            {{ $message }}
                        @endif
                    </ul>


                    <form action="{{ route('login.store') }}" method="post">
                        @csrf
                        <input type="text" name="name" placeholder="Введите ваше имя">
                        <input type="password" name="password" placeholder="Введите ваш пароль">
                        <input type="submit" class="btn" value="Войти">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
