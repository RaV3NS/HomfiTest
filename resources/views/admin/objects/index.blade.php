@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Список маркеров</div>

                    <div class="card-body">
                        <a href="{{ route('create_object') }}" class="btn btn-primary">Создать маркер</a>

                        <table class="table table-responsive object_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Координаты</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($markers as $marker)
                                    <tr>
                                        <td>{{ $marker->id }}</td>
                                        <td>{{ $marker->name }}</td>
                                        <td>{{ $marker->desc }}</td>
                                        <td>{{ $marker->coords }}</td>
                                        <td>{{ $marker->getStatus() }}</td>
                                        <td>
                                            <a href="/admin/objects/edit/{{ $marker->id }}" class="btn btn-sm btn-primary admin-btn-table">Редактировать</a>
                                            <delete-btn
                                                _id="{{ $marker->id }}"
                                                url="/admin/objects/delete/"
                                            ></delete-btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
