@extends('layout')

@section('content')
    <div class="admin_panel">
        <div class="overlay">
            <div class="container">
                <h2 class="title">Наши книги</h2>
                <div class="category">
                    @foreach ($categories as $category)
                        <p>{{ $category->name }}</p>
                    @endforeach
                </div>
                <div class="allBooks">

                    @foreach ($data as $item)
                        <div class="card">

                            <div class="img">
                                <img src="{{ asset('/storage/' . $item->img) }}" alt="b7">
                            </div>

                            <div class="desk">
                                <h2>{{ $item->name_book }}</h2>
                                <p>
                                    {{ $item->author }}
                                </p>
                                <div class="desk_text">
                                    <p>
                                        {{ $item->desk }}
                                    </p>
                                </div>

                                <div class="desk_category">
                                    Категория - {{ $item->category }}
                                </div>

                                <div class="buttons">
                                    <a class="btn update" href="{{ route('allBooksStore', $item->id) }}">Скачать книгу</a>
                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
