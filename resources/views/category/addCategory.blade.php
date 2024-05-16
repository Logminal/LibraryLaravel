@extends('layout')

@section('content')
    <div class="log" style="background-image: url('{{ asset('/storage/img/banner-1.png') }}');">
        <div class="overlay">
            <div class="container">
                <div class="lf">
                    <h2>Добавить новую категорию</h2>
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
                        <input type="text" name="name_book" placeholder="Название категории">
                        <button>Ok</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
