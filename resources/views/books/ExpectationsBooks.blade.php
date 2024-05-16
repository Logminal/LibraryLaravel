@extends('layout')

@section('content')
    <div class="admin_panel">
        <div class="overlay">
            <div class="container">
                <h2 class="title">Предложенные книги</h2>


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
                                        {{ $item->category }}
                                    </p>
                                    <div class="buttons">
                                        <a class="btn update"
                                            href="{{ route('book.expectation.download', $item->id) }}">Скачать
                                            книгу</a>
                                    </div>
                                </div>

                                <div class="buttons">
                                    <a class="btn update" href="{{ route('allBooksAccept', $item->id) }}">Принять</a>

                                    <form action="{{ route('allBooksReject', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn delete" value="Отклонить">
                                    </form>
                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
