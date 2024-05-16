@extends('layout')

@section('content')
    <div class="main__head__banner" style="background-image: url('{{ asset('/storage/img/banner.png') }}');">
        <div class="overlay">
            <div class="container-xxl">
                <div class="banner__desk">
                    <h4>ВЫ ИЩЕТЕ КНИГУ...?</h4>
                    <h2>САМАЯ БОЛЬШАЯ БИБЛИОТЕКА</h2>
                    <p>
                        Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. До они
                        запятых великий агентство возвращайся образ если заманивший! Эта страна всемогущая скатился.
                        Переписывается домах своего семь, там запятых имени.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome__library"id="about">
        <div class="container">
            <div class="wl__head">
                <h3>Добро Пожаловать В Библиотеку</h3>
                <p>
                    Добро пожаловать в самую популярную библиотеку на сегодняшний день
                </p>
                <div class="hr">
                    <div class="line"></div>
                    <i class="fa fa-book"></i>
                </div>
            </div>

            <div class="wl__body">
                <div class="row">

                    <div class="col-sm">
                        <i class="fa fa-gift"></i>
                        <h3>
                            <a href="#">ЭЛЕКТРОННЫЕ КНИГИ</a>
                        </h3>
                        <p>
                            электронная версия печатной книги, которую можно читать на компьютере.
                        </p>

                    </div>

                    <div class="col-sm">
                        <i class="fa fa-book"></i>
                        <h3>
                            <a href="#">АУДИОКНИГИ</a>
                        </h3>
                        <p>
                            аудиокассета или компакт-диск с записью чтения книги, обычно романа.
                        </p>
                    </div>

                    <div class="col-sm">
                        <i class="fa fa-clone"></i>
                        <h3>
                            <a href="#">ЖУРНАЛ</a>
                        </h3>
                        <p>
                            периодическое издание, содержащее статьи и информацию о иллюстрациях.
                        </p>
                    </div>

                    <div class="col-sm">
                        <i class="fa fa-calculator"></i>
                        <h3>
                            <a href="#">ДЕТИ И ДЕТИ</a>
                        </h3>
                        <p>
                            возраст человека от 13 до 19 лет и являются детьми и подростками.
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="top_cat" id="top_cat" style="background-image: url({{ asset('/storage/img/bg__top__category.png') }});">
        <div class="overlay">
            <div class="container">
                <div class="tc_head">

                    <h3>Наши Лучшие Категории</h3>
                    <p>
                        Вот некоторые из лучших категорий доступных книг.
                    </p>
                    <div class="hr">
                        <div class="line"></div>
                        <i class="fa fa-book"></i>
                    </div>

                </div>

                <div class="tc_body">

                    <div class="slider">
                        <div class="swiper mySwiper">

                            <div class="tc_body_head">

                                <div class="swiper-button swiper-button-next"></div>

                                <div class="swiper-button swiper-button-prev"></div>

                            </div>


                            <div class="swiper-wrapper">

                                @foreach ($data as $elem)
                                    <div id="tab1" class="swiper-slide">
                                        <div class="slide">
                                            <div class="row">

                                                @foreach ($data->take(4) as $item)
                                                    <div class="col-sm">
                                                        <div class="card__line">
                                                            <img src="{{ asset('/storage/' . $item->img) }}" alt="book3">
                                                            <h3>{{ $item->name_book }}</h3>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="top_book">
        <div class="container">
            <div class="tb_head">

                <h3>Самые Популярные Книги</h3>
                <p>
                    Самые популярные книги сегодня доступны в библиотеке книг
                </p>
                <div class="hr">
                    <div class="line"></div>
                    <i class="fa fa-book"></i>
                </div>

            </div>

            <div class="tb_body">

                @foreach ($data->take(6) as $item)
                    <div class="desk_left desk__item" id="tb{{ $item->id }}">

                        <img src="{{ asset('/storage/' . $item->img) }}" alt="b7">
                        <div class="desk">
                            <h2>{{ $item->name_book }}</h2>
                            <p>
                                Стефани Мейер
                            </p>
                            <div class="stars">
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <div class="desk_text">
                                <p>
                                    {{ $item->desk }}
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach

                <div class="desk_right">
                    <div class="books">

                        @foreach ($data->take(6) as $item)
                            <div class="book book__item" data-tab="#tb{{ $item->id }}">
                                <img src="{{ asset('/storage/' . $item->img) }}" alt="{{ $item->img }}">
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

    <div class="register" id="reg">
        <div class="container">
            <div class="r_head">
                <h3>Станьте Участником</h3>
                <p>
                    Отправьте идею своей книги, и вы сможете стать автором.
                </p>
                <div class="hr">
                    <div class="line"></div>
                    <i class="fa fa-book"></i>
                </div>
            </div>

            <div class="r_body">
                <form action="{{ route('regStore') }}" method="get">
                    <div class="colums">
                        <input placeholder="Выше имя" name="name" type="text">
                        <input placeholder="Ваш пароль" name="password" type="password">
                        <input placeholder="Ваша почта" name="email" type="text">
                        <input placeholder="Вош возраст" name="age" type="text">
                    </div>
                    <input type="submit" class="btn" value="Регистрация">
                </form>
            </div>
        </div>
    </div>
@endsection
