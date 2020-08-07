@extends('layouts.landing')

@section('content')
    <div class="container-fluid" style="margin-top: 2rem;">
        <table class="table table-responsive" style="margin-top: 1rem;">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Координаты</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($markers as $marker)
                <tr>
                    <td>{{ $marker->id }}</td>
                    <td>{{ $marker->name }}</td>
                    <td>{{ $marker->desc }}</td>
                    <td>{{ $marker->coords }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if (count($markers) == 0)
        <p class="search_empty">Объектов с таким именем или описанием не найдено</p>
    @endif
@endsection
