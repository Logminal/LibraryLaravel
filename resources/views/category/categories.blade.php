@extends('layout')

@section('content')
    <div class="admin_panel">
        <div class="overlay">
            <div class="container">
                <h2 class="title">Категории</h2>


                <div class="allCategories">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>

                                        <!-- Кнопка-триггер модального окна -->
                                        <button type="button" class="btn add__category" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2">
                                            Редактировать категорию
                                        </button>

                                        <!-- Модальное окно -->
                                        <div class="modal fade" id="exampleModal2" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Редактировать
                                                            категорию</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Закрыть"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="{{ route('category.update', $category->id) }}"
                                                            method="post" id="UpdateCategory">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="text" name="name"
                                                                value="{{ $category->name }}" class="add_category_input"
                                                                placeholder="Введите новое название категрии">
                                                        </form>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Закрыть</button>
                                                        <button form="UpdateCategory" class="btn btn-primary">Сохранить
                                                            изменения</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn add__category">
                                                Удалить категорию
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <!-- Кнопка-триггер модального окна -->
        <button type="button" class="btn add__category" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Добавить Категорию
        </button>

        <!-- Модальное окно -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить категорию</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('category.store') }}" method="post" id="addCategory">
                            @csrf
                            <input type="value" name="name" class="add_category_input"
                                placeholder="Введите название категории">
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button form="addCategory" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="btns">
            <a href="{{ route('admin.create') }}" class="add_book">Добавить Категорию</a>
        </div> --}}

    </div>
@endsection
