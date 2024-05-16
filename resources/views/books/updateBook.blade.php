@extends('layout')

@section('content')
    <div class="log update__book" style="background-image: url('{{ asset('/storage/img/banner-1.png') }}');">
        <div class="overlay">
            <div class="container">
                <div class="lf">
                    <h2>Редактирование книги <i>"{{ $book_info->name_book }}"</i> </h2>
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


                    <form action="{{ route('admin.update', $book_info->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="file" name="img" value="{{ $book_info->img }}" placeholder="Обложка">
                        <input type="text" name="name_book" value="{{ $book_info->name_book }}"
                            placeholder="Название книги">
                        <textarea name="desk" placeholder="Описание" value="" cols="30" rows="10">{{ $book_info->desk }}</textarea>
                        {{-- <input type="text" name="desk" value="{{ $book_info->desk }}" placeholder="Описание"> --}}
                        <input type="text" name="author" value="{{ $book_info->author }}" placeholder="Автор">
                        <select name="category" id="category">
                            <option value="{{ $book_info->category }}">{{ $book_info->category }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div>
                            <label for="book">Добавте книгу в формате PDF</label>
                            <input type="file" name="book" id="book"></input>
                        </div>
                        <button>Ok</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
