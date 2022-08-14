<!-- resources/views/sites/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
        @include('common.errors')

        <!-- Форма нового сайта -->
        <form action="{{ url('site') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Имя сайта -->
            <div class="form-group">
                <label for="site" class="col-sm-3 control-label">Сайт</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="site-name" class="form-control">
                </div>
            </div>
            <!-- Url сайта -->
            <div class="form-group">
                <label for="site" class="col-sm-3 control-label">Url</label>

                <div class="col-sm-6">
                    <input type="text" name="url" id="url-name" class="form-control">
                </div>
            </div>

            <!-- Кнопка добавления сайта -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить сайт
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Список сайтов -->
    @if (count($sites) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Сайты пользователя
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <tr>
                        <th>Site</th>
                        <th>Url</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($sites as $site)
                        <tr>
                            <!-- Имя сайта -->
                            <td class="table-text">
                                <div>{{ $site->name }}</div>
                            </td>
                            <!-- Url сайта -->
                            <td class="table-text">
                                <div>{{ $site->url }}</div>
                            </td>

                            <td>
                                <form action="{{ url('site/'.$site->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-site-{{ $site->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
