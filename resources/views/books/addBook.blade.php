@extends('layout')

@section('content')
    <div class="log" style="background-image: url('{{ asset('/storage/img/banner-1.png') }}');">
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


                    <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="obl">Добавте обложку книги</label>
                            <input type="file" name="img" id="obl" placeholder="Обложка">
                        </div>

                        <input type="text" name="name_book" placeholder="Название книги">
                        <input type="text" name="desk" placeholder="Описание">
                        <input type="text" name="author" placeholder="Автор">
                        {{-- <input type="text" name="category" placeholder="Категория"> --}}
                        <select name="category" id="category">
                            <option value="" disabled selected>Выберите категорию</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div>
                            <label for="book">Добавте книгу в формате PDF</label>
                            <input type="file" name="book" id="book">
                        </div>
                        <button>Ok</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
