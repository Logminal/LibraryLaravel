@extends('layout')

@section('content')
    <div class="admin_panel">
        <div class="overlay">
            <div class="container">
                <h2 class="title">Панель администратора</h2>


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

                                    <p>
                                        Категория - {{ $item->category }}
                                    </p>
                                </div>
                                <div class="buttons">
                                    <a class="btn update" href="{{ route('formUpdate', $item->id) }}">Редактировать</a>

                                    <form action="{{ route('admin.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn delete" value="Удалить">
                                    </form>
                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="btns">
            <a href="{{ route('admin.create') }}" class="add_book">Добавить книгу</a>
            <a href="{{ route('allBooks') }}" class="add_book">Предложенные книги</a>
            <a href="{{ route('category.index') }}" class="add_book">Категории</a>
        </div>

    </div>
@endsection
